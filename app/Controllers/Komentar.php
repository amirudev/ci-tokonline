<?php
namespace App\Controllers;

class Komentar extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        helper('form');
        $this->validation = \Config\Services::validation();
    }

    public function tambah()
    {
        $id_barang = $this->request->uri->getSegment(3);
        if($this->request->getPost())
        {
            $komentar = new \App\Models\KomentarModel();
            $data = $this->request->getPost();
            $this->validation->run($data, 'komentar');
            $errors = $this->validation->getErrors();
            if(!$errors)
            {
                $komentarEntity = new \App\Entities\Komentar();

                $komentarEntity->fill($data);
                $komentarEntity->created_by = $this->session->get('id');
                $komentarEntity->created_at = date('Y-m-d H:i:s');
                $komentar->save($komentarEntity);

                $segments = ['etalase', 'beli', $id_barang];

                return redirect()->to(site_url($segments));
            }
        }
        return view('komentar/tambah', [
            'id_barang' => $id_barang
        ]);
    }
}