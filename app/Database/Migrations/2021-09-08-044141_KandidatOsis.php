<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KandidatOsis extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'  => ['type' => 'int', 'constraint' => 5, 'auto_increment' => TRUE],
			'nomor_id'  => ['type' => 'int', 'constraint' => 3,],
			'nama'  => ['type' => 'varchar', 'constraint' => 70,],
			'kelas'  => ['type' => 'varchar', 'constraint' => 70,],
			'foto_id'  => ['type' => 'varchar', 'constraint' => 70,],
			'visi_misi'  => ['type' => 'text'],
			'updated_at' => [
				'type'           => 'datetime',
			],
			'deleted_at' => [
				'type'           => 'datetime',
			]
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('kandidat_osis');
	}

	public function down()
	{
		//
	}
}
