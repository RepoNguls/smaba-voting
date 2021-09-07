<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'  => ['type' => 'int', 'constraint' => 5,],
			'kegiatan'  => ['type' => 'varchar', 'constraint' => 70,],
			'keterangan'  => ['type' => 'varchar', 'constraint' => 70,],
			'link'  => ['type' => 'varchar', 'constraint' => 256,],
			'date_start'  => ['type' => 'datetime'],
			'date_end'  => ['type' => 'datetime'],
			'is_active'  => ['type' => 'int', 'constraint' => 5,],
			'updated_at' => [
				'type'           => 'datetime',
			],
			'deleted_at' => [
				'type'           => 'datetime',
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('kegiatan');
	}

	public function down()
	{
		//
	}
}
