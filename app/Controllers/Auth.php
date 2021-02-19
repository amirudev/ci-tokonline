<?php

namespace App\Controllers;

class Auth extends BaseController
{	
	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->session = session();
	}
	
	public function register()
	{
		helper('form');
		if($this->request->getPost()){
			$data = $this->request->getPost();
			$validate = $this->validation->run($data, 'register');
			$errors = $this->validation->getErrors();
			if(!$errors){
				$userModel = new \App\Models\UserModel();
				$user = new \App\Entities\User();
				$user->username = $this->request->getPost('Username');
				$user->password = $this->request->getPost('Password');
				$user->created_by = 0;
				$user->created_date = date("Y-m-d H:i:s");
				$user->role = 0; // User
				$userModel->save($user);
				return view('login');
			}
			$this->session->setFlashdata('errors', $errors);
		}
		return view('register');
	}

	public function login()
	{
		helper('form');
		if($this->request->getPost()){
			$data = $this->request->getPost();
			$userModel = new \App\Models\UserModel();
			$username = $this->request->getPost('Username');
			$password = $this->request->getPost('Password');
			$user = $userModel->where('Username', $username)
			->first();
			
			if($user){
				$salt = $user->salt;
				if($user->password !== md5($salt.$password)){
					$this->session->setFlashdata('errors', ['Username atau Password tidak ditemukan!']);
					
				} else {
					$sessData = [
						'username' => $user->username,
						'id' => $user->id,
						'role' => $user->role,
						'isLoggedIn' => TRUE
					];

					$this->session->set($sessData);
					return redirect()->to(base_url('home'));
					
				}
			} else {
				$this->session->setFlashdata('errors', ['Username atau Password tidak ditemukan!']);
			}
		}
		
		return view('login');
	}

	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(site_url('auth/login'));
	}
}