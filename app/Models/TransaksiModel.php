<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_pembeli', 'id_barang', 'jumlah', 'total_harga', 'alamat', 'ongkir', 'status', 'created_by', 'created_at', 'uploaded_by', 'uploaded_at'];
    protected $returnType       = 'App\Entities\Transaksi';
    protected $useTimeStampes   = false;
}