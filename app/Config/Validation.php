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
			'rules' => 'required|matches[Password]'
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

	public $barang = [
		'nama' => [
			'rules' => 'required|min_length[3]'
		],
		'harga' => [
			'rules' => 'required|is_natural'
		],
		'stok' => [
			'rules' => 'required|is_natural'
		],
		'gambar' => [
			'rules' => 'uploaded[gambar]'
		]
	];

	public $barang_errors = [
		'nama' => [
			'required' => '{field} wajib diisi',
			'min_length' => '{field} harus lebih dari 3 Karakter',
		],
		'harga' => [
			'required' => '{field} wajib diisi',
			'is_natural' => '{field} harus lebih dari Rp0',
		],
		'stok' => [
			'required' => '{field} wajib diisi',
			'is_natural' => '{field} harus lebih dari 0',
		],
		'gambar' => [
			'uploaded' => '{field} wajib diunggah',
		]
	];

	public $transaksi = [
		'id_pembeli' => [
			'rules' => 'required'
		],
		'id_barang' => [
			'rules' => 'required'
		],
		'jumlah' => [
			'rules' => 'required'
		],
		'total_harga' => [
			'rules' => 'required'
		],
		'alamat' => [
			'rules' => 'required'
		],
		'ongkir' => [
			'rules' => 'required'
		],
	];
}
