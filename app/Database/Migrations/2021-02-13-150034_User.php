<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'username' => [
				'type' => 'TEXT',
				'constraint' => 100
			],
			'password' => [
				'type' => 'TEXT'
			],
			'salt' => [
				'type' => 'TEXT'
			],
			'avatar' => [
				'type' => 'TEXT',
				'null' => TRUE
			],
			'role' => [
				'type'=> 'INT',
				'constraint' => 1,
				'default' => 1
			],
			'created_by' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'created_at' => [
				'type' => 'DATETIME',
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
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
