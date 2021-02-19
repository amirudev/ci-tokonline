<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'harga', 'stok', 'gambar', 'created_by', 'created_at', 'uploaded_by', 'uploaded_at'];
    protected $returnType       = 'App\Entities\Barang';
    protected $useTimeStampes   = false;
}