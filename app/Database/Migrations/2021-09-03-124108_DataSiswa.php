<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataSiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_peserta'  => ['type' => 'int', 'constraint' => 5, 'auto_increment' => TRUE],
			'username'  => ['type' => 'varchar', 'constraint' => 70,],
			'nama'  => ['type' => 'varchar', 'constraint' => 70,],
			'kelas'  => ['type' => 'varchar', 'constraint' => 70,],
			'password'  => ['type' => 'varchar', 'constraint' => 255,],
			'kegiatan'  => ['type' => 'varchar', 'constraint' => 70,],
			'last_login'  => ['type' => 'varchar', 'constraint' => 70,],
			'is_active'  => ['type' => 'int', 'constraint' => 5,],
			'updated_at' => [
				'type'           => 'datetime',
			],
			'deleted_at' => [
				'type'           => 'datetime',
			]
		]);
		$this->forge->addKey('username', TRUE);
		$this->forge->createTable('data_peserta');
	}

	public function down()
	{
		$this->forge->dropTable('data_peserta');
	}
}
