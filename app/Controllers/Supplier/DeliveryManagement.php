<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class DeliveryManagement extends BaseController
{
    public function index(): string
    {
        // Sample delivery management data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'delivery-management',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'active_tab' => $this->request->getGet('tab') ?? 'active',
            'kpis' => [
                'in_transit' => [
                    'value' => '8',
                    'icon' => '🚚',
                    'color' => 'blue',
                    'label' => 'In Transit'
                ],
                'scheduled' => [
                    'value' => '12',
                    'icon' => '📅',
                    'color' => 'purple',
                    'label' => 'Scheduled'
                ],
                'todays_deliveries' => [
                    'value' => '5',
                    'icon' => '⏰',
                    'color' => 'green',
                    'label' => "Today's Deliveries"
                ],
                'on_time_rate' => [
                    'value' => '94%',
                    'icon' => '🏆',
                    'color' => 'orange',
                    'label' => 'On-Time Rate'
                ]
            ],
            'active_deliveries' => [
                [
                    'id' => 'DEL-001',
                    'order_id' => 'PO-001234',
                    'branch' => 'Downtown Branch',
                    'driver' => 'John Smith',
                    'items_weight' => '15 items / 250 kg',
                    'scheduled_time' => '2024-01-16 14:30',
                    'status' => 'In Transit',
                    'status_class' => 'in-transit',
                    'progress' => 75,
                    'progress_text' => '75%'
                ],
                [
                    'id' => 'DEL-002',
                    'order_id' => 'PO-001235',
                    'branch' => 'Mall Branch',
                    'driver' => 'Mike Johnson',
                    'items_weight' => '23 items / 180 kg',
                    'scheduled_time' => '2024-01-16 16:00',
                    'status' => 'Loading',
                    'status_class' => 'loading',
                    'progress' => 25,
                    'progress_text' => '25%'
                ]
            ],
            'completed_deliveries' => [
                [
                    'id' => 'DEL-003',
                    'order_id' => 'PO-001236',
                    'branch' => 'Airport Branch',
                    'driver' => 'Sarah Wilson',
                    'items_weight' => '8 items / 120 kg',
                    'scheduled_time' => '2024-01-15 10:00',
                    'status' => 'Delivered',
                    'status_class' => 'delivered',
                    'progress' => 100,
                    'progress_text' => '100%',
                    'delivered_time' => '2024-01-15 10:15'
                ]
            ]
        ];

        return view('supplier/delivery-management', $data);
    }

    public function trackLocation($deliveryId)
    {
        // Handle track location action
        return redirect()->back()->with('message', "Tracking location for delivery {$deliveryId}");
    }

    public function updateStatus($deliveryId)
    {
        // Handle update status action
        return redirect()->back()->with('message', "Status updated for delivery {$deliveryId}");
    }

    public function markDelivered($deliveryId)
    {
        // Handle mark delivered action
        return redirect()->back()->with('message', "Delivery {$deliveryId} marked as delivered");
    }
}
