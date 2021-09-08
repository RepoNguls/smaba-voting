<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemilihanOsis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'  => ['type' => 'int', 'constraint' => 5, 'auto_increment' => true],
			'username'  => ['type' => 'varchar', 'constraint' => 70,],
			'kelas'  => ['type' => 'varchar', 'constraint' => 70,],
			'pilihan_id'  => ['type' => 'int', 'constraint' => 3,],
			'created_at' => [
				'type'           => 'datetime',
			],
			'updated_at' => [
				'type'           => 'datetime',
			],
			'deleted_at' => [
				'type'           => 'datetime',
			]
		]);
		$this->forge->addKey('username', true);
		$this->forge->createTable('pemilihan_osis');
	}

	public function down()
	{
		//
	}
}
