<?php

namespace App\Controllers\IT;

use App\Controllers\BaseController;

class UserManagement extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'User Management',
            'kpis' => [
                'total_users' => ['value' => '247', 'icon' => '👥', 'color' => 'blue'],
                'active_users' => ['value' => '234', 'icon' => '✅', 'color' => 'green'],
                'inactive_users' => ['value' => '13', 'icon' => '⏸️', 'color' => 'orange'],
                'admin_users' => ['value' => '45', 'icon' => '👑', 'color' => 'purple'],
            ],
            'users' => [
                [
                    'name' => 'John Smith',
                    'email' => 'john.smith@scms.com',
                    'role' => 'Branch Manager',
                    'branch' => 'Main Branch',
                    'status' => 'Active',
                    'last_login' => '2024-01-15 09:30',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'Sarah Johnson',
                    'email' => 'sarah.johnson@scms.com',
                    'role' => 'Inventory Staff',
                    'branch' => 'North Branch',
                    'status' => 'Active',
                    'last_login' => '2024-01-15 08:45',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'Mike Davis',
                    'email' => 'mike.davis@scms.com',
                    'role' => 'Central Office Admin',
                    'branch' => 'Central Office',
                    'status' => 'Active',
                    'last_login' => '2024-01-15 10:15',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'Lisa Wilson',
                    'email' => 'lisa.wilson@scms.com',
                    'role' => 'Supplier',
                    'branch' => 'External',
                    'status' => 'Active',
                    'last_login' => '2024-01-14 16:20',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'Tom Brown',
                    'email' => 'tom.brown@scms.com',
                    'role' => 'Logistics Coordinator',
                    'branch' => 'Central Office',
                    'status' => 'Inactive',
                    'last_login' => '2024-01-12 14:30',
                    'status_class' => 'inactive'
                ],
                [
                    'name' => 'Emily Chen',
                    'email' => 'emily.chen@scms.com',
                    'role' => 'IT Administrator',
                    'branch' => 'Central Office',
                    'status' => 'Active',
                    'last_login' => '2024-01-15 11:00',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'David Rodriguez',
                    'email' => 'david.rodriguez@scms.com',
                    'role' => 'Franchise Manager',
                    'branch' => 'South Branch',
                    'status' => 'Active',
                    'last_login' => '2024-01-15 07:30',
                    'status_class' => 'active'
                ],
                [
                    'name' => 'Anna Thompson',
                    'email' => 'anna.thompson@scms.com',
                    'role' => 'Accountant',
                    'branch' => 'Central Office',
                    'status' => 'Inactive',
                    'last_login' => '2024-01-10 15:45',
                    'status_class' => 'inactive'
                ]
            ],
            'roles' => ['All Roles', 'Admin', 'Branch Manager', 'Inventory Staff', 'Supplier', 'IT Administrator', 'Franchise Manager', 'Accountant']
        ];

        return view('it/user-management', $data);
    }
}
