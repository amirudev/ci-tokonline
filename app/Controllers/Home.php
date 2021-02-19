<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		$this->session = session();
	}

	public function index()
	{
		return view('home');
	}
}
