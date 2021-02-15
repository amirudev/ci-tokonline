<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'Username' => [
			'rules' => 'required|min_length[5]'
		],
		'Password' => [
			'rules' => 'required|min_length[8]'
		],
		'repeatPassword' => [
			'rules' => 'required|matches[password]'
		]
	];

	public $register_errors = [
		'Username' => [
			'required' => '{field} Wajib diisi',
			'min_length' => '{field} Minimal 5 Karakter',
		],
		'Password' => [
			'required' => '{field} Wajib diisi',
			'min_length' => '{field} Minimal 8 Karakter',
		],
		'repeatPassword' => [
			'required' => 'Repeat Password Wajib diisi',
			'matches' => 'Repeat Password harus sama dengan kolom Password',
		]
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[5]'
		],
		'password' => [
			'rules' => 'required|min_length[8]'
		]
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} Wajib diisi',
			'min_length' => '{field} Minimal 5 Karakter',
		],
		'password' => [
			'required' => '{field} Wajib diisi',
			'min_length' => '{field} Minimal 8 Karakter',
		]
	];
}
