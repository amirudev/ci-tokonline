<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class User extends BaseController
{
    public function index()
    {
        $dataModel = new \App\Models\UserModel();

        $data = [
            'users' => $dataModel->paginate(10),
            'pager' => $dataModel->pager
        ];

        return view('user/index', [
            'data' => $data
        ]);
    }
}