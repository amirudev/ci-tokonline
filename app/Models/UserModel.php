<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'user';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['username', 'password', 'salt', 'avatar', 'role', 'created_by', 'created_at', 'uploaded_by', 'uploaded_at'];
	protected $returnType           = 'App\Entities\User';
	protected $useTimeStampes       = false;
}