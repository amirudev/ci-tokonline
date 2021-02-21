<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table            = 'komentar';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_user', 'id_barang', 'komentar', 'created_by', 'created_at'];
    protected $returnType       = 'App\Entities\Komentar';
    protected $useTimeStampes   = false;
}