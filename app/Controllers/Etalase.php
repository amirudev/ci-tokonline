<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Etalase extends Controller
{
    private $url = 'https://api.rajaongkir.com/starter/';
    private $apiKey = '0af0b763e78e724daf54a7d794118ca4';

    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $barangModel = new \App\Models\BarangModel();
        $barang = $barangModel->findAll();
        return view('etalase/index', [
            'barangs' => $barang
        ]);
    }

    public function beli()
    {
        $id = $this->request->uri->getSegment(3);
        $barangModel = new \App\Models\BarangModel();
        $barang = $barangModel->find($id);
        if($this->request->getPost()){
            $data = $this->request->getPost();
            $this->validation->run($data, 'transaksi');
            $errors = $this->validation->getErrors();

            if(!$errors){
                $transaksiModel = new \App\Models\TransaksiModel();
                $transaksi = new \App\Entities\Transaksi();

                $transaksi->fill($data);
                $transaksi->status = 0;
                $transaksi->created_by = $this->session->get('id');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $transaksiModel->save($transaksi);
                $id = $transaksiModel->insertID();

                $barangModel = new \App\Models\BarangModel();
                $id_barang = $this->request->getPost('id_barang');
                $jumlah_pembelian = $this->request->getPost('jumlah');
                $barang = $barangModel->find($id_barang);
                $entityBarang = new \App\Entities\Barang();
                $entityBarang->stok = $barang->stok-$jumlah_pembelian;
                $barangModel->save($entityBarang);

                $segment = ['transaksi', 'view', $id];
                return redirect()->to(site_url($segment));
            }

            print_r($errors);
            exit();
        }
        $province = $this->rajaongkir('province');
        return view('etalase/beli', [
            'barang' => $barang,
            'provinsis' => json_decode($province)->rajaongkir->results
        ]);
    }

    public function getCity()
    {
        if($this->request->isAJAX())
        {
            $province_id = $this->request->getGET('id_province');
            $data = $this->rajaongkir('city', $province_id);
            return $this->response->setJSON($data);
        }
    }

    public function getCost()
    {
        if($this->request->isAJAX())
        {
            $origin = $this->request->getGET('origin_city');
            $destination = $this->request->getGET('id_city');
            $weight = $this->request->getGET('weight');
            $courier = $this->request->getGET('courier');
            $data = $this->rajaongkircost($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }

    private function rajaongkir($method, $province_id=NULL)
    {
        $endPoint = $this->url.$method;
        $curl = curl_init();

        if($province_id!=NULL)
        {
            $endPoint = $endPoint . "?province=" . $province_id;
        }

        curl_setopt_array($curl, array(
        CURLOPT_URL => $endPoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: $this->apiKey"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

    private function rajaongkircost($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->apiKey"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }
}