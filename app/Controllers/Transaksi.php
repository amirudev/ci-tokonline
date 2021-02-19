<?php
namespace App\Controllers;

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
}