<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'ABC Suppliers Ltd.',
                'email' => 'supplier@abcsuppliers.com',
                'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'supplier',
                'company_name' => 'ABC Suppliers Ltd.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'John Smith',
                'email' => 'john@abcsuppliers.com',
                'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'supplier',
                'company_name' => 'ABC Suppliers Ltd.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
