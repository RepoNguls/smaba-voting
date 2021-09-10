<?php

namespace App\Models;

use CodeIgniter\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class PemilihanOsisModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'pemilihan_osis';
	protected $primaryKey           = 'username';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'id',
		'username',
		'kelas',
		'pilihan_id',
	];

	// Dates
	protected $useTimestamps        = true;
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

	public function save_pilih($data, $user)
	{
		$this->where('username', $user);
		if ($this->countAllResults() == 0) {
			return $this->insert($data);
		} else {
			return $this->update($user, $data);
		}
	}


	public function getPilihan($id)
	{
		return $this->where(['username' => $id])->first();
	}

	public function hasilPemilihan()
	{
		$builder = $this->db->query('SELECT *, COUNT(pilihan_id) AS Total FROM pemilihan_osis GROUP BY `pilihan_id`');
		return $builder->getResultArray();
	}
}
