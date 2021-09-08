<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'data_peserta';
	protected $primaryKey           = 'id_peserta';
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

	public function login_siswa($data)
	{
		$this->where('username', $data['username']);
		if ($this->countAllResults() == 0) {
			return false;
		} else {
			$query = $this->get();
			//Bandingkan Input Password dengan yang ada di database
			$result = $query->getRowArray();
			$validPassword = $data['password'] == $result['password'];
			if ($validPassword) {
				return $result = $query->getRowArray();
			}
		}
	}

	public function save_waktu($data, $id)
	{
		$builder = $this->db->table('data_peserta');
		$builder->where('id_peserta', $id);
		$builder->update($data);
		return true;
	}
}
