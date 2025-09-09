<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';
	protected $returnType = 'array';
	protected $useTimestamps = true;
	protected $allowedFields = [
		'name', 'email', 'password_hash', 'role', 'company_name', 'created_at', 'updated_at', 'deleted_at',
	];

	public function findByEmail(string $email): ?array
	{
		$user = $this->where('email', $email)->first();
		return $user ?: null;
	}
}


