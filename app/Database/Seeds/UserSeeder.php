<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$builder = $this->db->table('users');
		$now = date('Y-m-d H:i:s');

		$users = [
			[ 'name' => 'System Administrator', 'email' => 'admin@example.com', 'role' => 'sys_admin', 'password' => 'admin123' ],
			[ 'name' => 'Central Office Admin', 'email' => 'central@example.com', 'role' => 'central_admin', 'password' => 'central123' ],
			[ 'name' => 'Branch Manager', 'email' => 'branch@example.com', 'role' => 'branch_manager', 'password' => 'branch123' ],
			[ 'name' => 'Inventory Staff', 'email' => 'inventory@example.com', 'role' => 'inventory_staff', 'password' => 'inventory123' ],
			[ 'name' => 'Supplier', 'email' => 'supplier@example.com', 'role' => 'supplier', 'password' => 'supplier123' ],
			[ 'name' => 'Logistics Coordinator', 'email' => 'logistics@example.com', 'role' => 'logistics_coordinator', 'password' => 'logistics123' ],
			[ 'name' => 'Franchise Manager', 'email' => 'franchise@example.com', 'role' => 'franchise_manager', 'password' => 'franchise123' ],
		];

		foreach ($users as $u) {
			$exists = $builder->where('email', $u['email'])->get()->getFirstRow();
			if ($exists) {
				continue;
			}
			$builder->insert([
				'name' => $u['name'],
				'email' => $u['email'],
				'password_hash' => password_hash($u['password'], PASSWORD_DEFAULT),
				'role' => $u['role'],
				'created_at' => $now,
				'updated_at' => $now,
			]);
		}
	}
}


