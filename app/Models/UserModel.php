<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'data_peserta';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function get_user($id_peserta)
	{
		return $this->where(['id_peserta' => $id_peserta])->first();
	}
	public function save_profile($data, $id)
	{
		$this->where('id_peserta', $id);
		return $this->update($id, $data);
	}
	public function import_siswa($data)
	{
		$this->insertBatch($data);
		return true;
	}
	public function save_absen($data, $no_pendaftaran)
	{
		$this->where('id_peserta', $no_pendaftaran);
		//  $this->set($data);
		$this->update($no_pendaftaran, $data);
		echo 1;
	}
}
