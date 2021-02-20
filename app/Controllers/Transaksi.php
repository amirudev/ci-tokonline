<?php
namespace App\Controllers;

use TCPDF;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->email = \Config\Services::email();
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->join('barang', 'barang.id=transaksi.id_barang')
        ->join('user', 'user.id=transaksi.id_pembeli')
        ->where('transaksi.id', $id)
        ->first();

        return view('transaksi/view', [
            'transaksi' => $transaksi
        ]);
    }

    public function index()
    {
        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksis = $transaksiModel->findAll();
        return view('transaksi/index', [
            'transaksis' => $transaksis
        ]);
    }

    public function print()
    {
        $id_transaksi = $this->request->uri->getSegment(3);
        $transaksiModel = new \App\Models\TransaksiModel();
        $transaksi = $transaksiModel->find($id_transaksi);

        $barangModel = new \App\Models\BarangModel();
        $barang = $barangModel->find($transaksi->id_barang);

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($transaksi->id_pembeli);

        $html = view('transaksi/print', [
            'transaksi' => $transaksi,
            'barang' => $barang,
            'user' => $user
        ]);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->setCreator(PDF_CREATOR);
        $pdf->SetAuthor('Wahyu Amirulloh');
        $pdf->SetTitle("INVOICE PRINT TRANSAKSI $barang->id");
        $pdf->SetSubject("INVOICE PRINT TRANSAKSI $barang->id");

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');
        // $this->response->setContentType('application/pdf');

        $fileName = "INVOICE_PRINT_TRANSAKSI_$transaksi->id.pdf";

        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . "uploads/$fileName", 'F');

        $subject = "Invoice TokoIgniter Transaksi $transaksi->id";
        $message = "<h1>Halo, $user->username</h1>.<br>Berikut adalah invoice pembelian $barang->nama dengan ID Transaksi $transaksi->id.<br>Terima kasih sudah belanja di TokoIgniter!<br>Attachment invoice dilampirkan dibawah, Have a nice day!";
        $attachment = $_SERVER['DOCUMENT_ROOT'] . "uploads/$fileName";

        $this->sendMail($subject, $message, $attachment);

        return redirect()->to(base_url('transaksi/index'));
    }

    private function sendMail($subject, $message, $attachment)
    {
        ini_set('max_execution_time', 360); 
        ini_set('memory_limit','2048M');
        $this->email->setFrom('aabalabal65@gmail.com', 'Admin TokoIgniter');
        $this->email->setTo('wahyu77889966@gmail.com');

        $this->email->setSubject($subject);
        $this->email->setMessage($message);
        $this->email->attach($attachment);

        if(!$this->email->send()){
            $this->session->setFlashdata('message', ['status' => 'danger', 'message' => 'E-mail gagal dikirimkan']);
        }else{
            unlink($attachment);
            $this->session->setFlashdata('message', ['status' => 'success', 'message' => 'E-mail berhasil dikirimkan!']);
        }
    }
}