<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class PurchaseOrders extends BaseController
{
    public function index(): string
    {
        // Sample purchase orders data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'purchase-orders',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'orders' => [
                [
                    'id' => 'PO-001234',
                    'branch' => 'Downtown Branch',
                    'request_date' => '2024-01-15',
                    'required_date' => '2024-01-17',
                    'contact_person' => 'Sarah Johnson',
                    'status' => 'Processing',
                    'status_class' => 'processing',
                    'amount' => '$2,450',
                    'items' => [
                        ['name' => 'Office Supplies', 'qty' => 50, 'unit_price' => '$25.00'],
                        ['name' => 'Cleaning Materials', 'qty' => 30, 'unit_price' => '$15.00'],
                        ['name' => 'Safety Equipment', 'qty' => 20, 'unit_price' => '$45.00']
                    ]
                ],
                [
                    'id' => 'PO-001235',
                    'branch' => 'Mall Branch',
                    'request_date' => '2024-01-14',
                    'required_date' => '2024-01-16',
                    'contact_person' => 'Mike Chen',
                    'status' => 'Quoted',
                    'status_class' => 'quoted',
                    'amount' => '$1,890',
                    'items' => [
                        ['name' => 'Electronics', 'qty' => 15, 'unit_price' => '$85.00'],
                        ['name' => 'Cables & Accessories', 'qty' => 25, 'unit_price' => '$12.00'],
                        ['name' => 'Maintenance Tools', 'qty' => 10, 'unit_price' => '$35.00']
                    ]
                ],
                [
                    'id' => 'PO-001236',
                    'branch' => 'Airport Branch',
                    'request_date' => '2024-01-13',
                    'required_date' => '2024-01-15',
                    'contact_person' => 'Lisa Wang',
                    'status' => 'Confirmed',
                    'status_class' => 'confirmed',
                    'amount' => '$3,200',
                    'items' => [
                        ['name' => 'Furniture', 'qty' => 8, 'unit_price' => '$200.00'],
                        ['name' => 'Lighting Fixtures', 'qty' => 12, 'unit_price' => '$75.00'],
                        ['name' => 'Decorative Items', 'qty' => 20, 'unit_price' => '$25.00']
                    ]
                ]
            ]
        ];

        return view('supplier/purchase-orders', $data);
    }

    public function viewDetails($orderId)
    {
        // Handle view details action
        return redirect()->back()->with('message', "Viewing details for order {$orderId}");
    }

    public function sendQuote($orderId)
    {
        // Handle send quote action
        return redirect()->back()->with('message', "Quote sent for order {$orderId}");
    }

    public function confirmOrder($orderId)
    {
        // Handle confirm order action
        return redirect()->back()->with('message', "Order {$orderId} confirmed");
    }
}
