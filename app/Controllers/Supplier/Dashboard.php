<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        // Sample data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'dashboard',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'kpis' => [
                'active_orders' => [
                    'value' => 127,
                    'change' => '+12%',
                    'icon' => '📄',
                    'color' => 'blue'
                ],
                'pending_deliveries' => [
                    'value' => 43,
                    'change' => '+8%',
                    'icon' => '🚚',
                    'color' => 'orange'
                ],
                'monthly_revenue' => [
                    'value' => '$284,750',
                    'change' => '+15%',
                    'icon' => '$',
                    'color' => 'green'
                ],
                'on_time_delivery' => [
                    'value' => '94.2%',
                    'change' => '+2.1%',
                    'icon' => '⏰',
                    'color' => 'purple'
                ]
            ],
            'deliveries' => [
                [
                    'id' => 'DEL-001',
                    'location' => 'Downtown Branch',
                    'status' => 'In Transit',
                    'eta' => '2 hours',
                    'driver' => 'John Smith',
                    'items' => 15,
                    'progress' => 75
                ],
                [
                    'id' => 'DEL-002',
                    'location' => 'Mall Branch',
                    'status' => 'Loading',
                    'eta' => '4 hours',
                    'driver' => 'Mike Johnson',
                    'items' => 23,
                    'progress' => 25
                ],
                [
                    'id' => 'DEL-003',
                    'location' => 'Airport Branch',
                    'status' => 'Delivered',
                    'eta' => 'Completed',
                    'driver' => 'Sarah Wilson',
                    'items' => 8,
                    'progress' => 100
                ]
            ]
        ];

        return view('supplier/dashboard', $data);
    }
}
