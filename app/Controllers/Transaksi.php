<?php
namespace App\Controllers;

use TCPDF;

class Transaksi extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
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

        // Print text using writeHTMLCell()
        $pdf->writeHTML($html, true, false, true, false, '');
        $this->response->setContentType('application/pdf');

        $pdf->Output("INVOICE PRINT TRANSAKSI $barang->id", 'I');
    }
}