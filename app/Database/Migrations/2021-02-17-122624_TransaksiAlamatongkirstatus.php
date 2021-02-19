<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiAlamatongkirstatus extends Migration
{
	public function up()
	{
		$fields = [
			'alamat' => [
				'type' => 'TEXT'
			],
			'ongkir' => [
				'TYPE' => 'INT'
			],
			'status' => [
				'type' => 'INT',
				'constraint' => 1
			]
		];

		$this->forge->addColumn('transaksi', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('transaksi', ['alamat', 'ongkir', 'status']);
	}
}
