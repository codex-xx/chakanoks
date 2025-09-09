<?php

namespace App\Controllers\IT;

use App\Controllers\BaseController;

class ITDashboard extends BaseController
{
    public function index()
    {
        // Mock data for IT Dashboard
        $data = [
            'title' => 'IT Administrator Dashboard',
            'company_name' => 'SCMS Admin',
            'kpis' => [
                'total_users' => [
                    'value' => '247',
                    'label' => 'Total Users',
                    'change' => '↑ 12% from last month',
                    'icon' => '👤',
                    'color' => 'blue'
                ],
                'active_sessions' => [
                    'value' => '124',
                    'label' => 'Active Sessions',
                    'change' => '↑ 8% from yesterday',
                    'icon' => '📊',
                    'color' => 'green'
                ],
                'system_uptime' => [
                    'value' => '99.9%',
                    'label' => 'System Uptime',
                    'change' => 'Last 30 days',
                    'icon' => '⏰',
                    'color' => 'purple'
                ],
                'storage_used' => [
                    'value' => '67%',
                    'label' => 'Storage Used',
                    'change' => '2.1TB of 3TB total',
                    'icon' => '💾',
                    'color' => 'orange'
                ]
            ],
            'system_activity' => [
                'labels' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                'data' => [1200, 1500, 1800, 1600, 2200, 1900, 1400],
                'data2' => [800, 1000, 1200, 1100, 1500, 1300, 900]
            ],
            'branches' => [
                [
                    'name' => 'Main Branch',
                    'active_users' => '45 active users',
                    'status' => 'Online',
                    'last_seen' => '2 min ago',
                    'status_class' => 'online'
                ],
                [
                    'name' => 'North Branch',
                    'active_users' => '32 active users',
                    'status' => 'Online',
                    'last_seen' => '5 min ago',
                    'status_class' => 'online'
                ],
                [
                    'name' => 'South Branch',
                    'active_users' => '28 active users',
                    'status' => 'Online',
                    'last_seen' => '1 min ago',
                    'status_class' => 'online'
                ],
                [
                    'name' => 'East Branch',
                    'active_users' => '0 active users',
                    'status' => 'Maintenance',
                    'last_seen' => '2 hours ago',
                    'status_class' => 'maintenance'
                ]
            ],
            'system_alerts' => [
                [
                    'message' => 'Database backup scheduled in 30 minutes',
                    'timestamp' => '10:30 AM',
                    'type' => 'warning',
                    'color' => 'orange'
                ],
                [
                    'message' => 'System update completed successfully',
                    'timestamp' => '9:45 AM',
                    'type' => 'info',
                    'color' => 'blue'
                ],
                [
                    'message' => 'Failed login attempt from unknown IP',
                    'timestamp' => '9:15 AM',
                    'type' => 'error',
                    'color' => 'red'
                ],
                [
                    'message' => 'All security patches applied',
                    'timestamp' => '8:30 AM',
                    'type' => 'success',
                    'color' => 'green'
                ],
                [
                    'message' => 'Server maintenance completed',
                    'timestamp' => '7:45 AM',
                    'type' => 'info',
                    'color' => 'blue'
                ],
                [
                    'message' => 'High CPU usage detected on server-02',
                    'timestamp' => '7:20 AM',
                    'type' => 'warning',
                    'color' => 'orange'
                ]
            ]
        ];

        return view('it/dashboard', $data);
    }
}
