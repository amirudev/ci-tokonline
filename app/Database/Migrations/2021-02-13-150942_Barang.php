<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'nama' => [
				'type' => 'TEXT',
				'constraint' => 100
			],
			'harga' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'stok' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'gambar' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'uploaded_by' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE
			],
			'uploaded_date' => [
				'type' => 'DATETIME',
				'null' => TRUE
			]
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('barang');
	}

	public function down()
	{
		$this->forge->dropTable('barang');
	}
}
