<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'nama', 'harga', 'stok', 'gambar'];
    protected $returnType       = 'App\Entities\Barang';
    protected $useTimeStampes   = false;
}