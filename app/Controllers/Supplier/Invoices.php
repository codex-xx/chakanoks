<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class Invoices extends BaseController
{
    public function index(): string
    {
        // Sample invoices data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'invoices',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'kpis' => [
                'total_revenue' => [
                    'value' => '$9,640',
                    'icon' => '💰',
                    'color' => 'blue',
                    'label' => 'Total Revenue'
                ],
                'paid' => [
                    'value' => '$2,450',
                    'icon' => '✅',
                    'color' => 'green',
                    'label' => 'Paid'
                ],
                'pending' => [
                    'value' => '$1,890',
                    'icon' => '⏰',
                    'color' => 'orange',
                    'label' => 'Pending'
                ],
                'overdue' => [
                    'value' => '$3,200',
                    'icon' => '🔔',
                    'color' => 'red',
                    'label' => 'Overdue'
                ]
            ],
            'invoices' => [
                [
                    'id' => 'INV-2024-001',
                    'order_id' => 'PO-001234',
                    'branch' => 'Downtown Branch',
                    'amount' => '$2,450',
                    'status' => 'Paid',
                    'status_class' => 'paid',
                    'issue_date' => '2024-01-15',
                    'due_date' => '2024-01-30',
                    'paid_date' => '2024-01-28'
                ],
                [
                    'id' => 'INV-2024-002',
                    'order_id' => 'PO-001235',
                    'branch' => 'Mall Branch',
                    'amount' => '$1,890',
                    'status' => 'Pending',
                    'status_class' => 'pending',
                    'issue_date' => '2024-01-14',
                    'due_date' => '2024-01-29',
                    'paid_date' => null
                ],
                [
                    'id' => 'INV-2024-003',
                    'order_id' => 'PO-001236',
                    'branch' => 'Airport Branch',
                    'amount' => '$3,200',
                    'status' => 'Overdue',
                    'status_class' => 'overdue',
                    'issue_date' => '2024-01-10',
                    'due_date' => '2024-01-25',
                    'paid_date' => null
                ],
                [
                    'id' => 'INV-2024-004',
                    'order_id' => 'PO-001237',
                    'branch' => 'City Center Branch',
                    'amount' => '$2,100',
                    'status' => 'Draft',
                    'status_class' => 'draft',
                    'issue_date' => '2024-01-16',
                    'due_date' => '2024-01-31',
                    'paid_date' => null
                ]
            ]
        ];

        return view('supplier/invoices', $data);
    }

    public function view($invoiceId)
    {
        // Handle view invoice action
        return redirect()->back()->with('message', "Viewing invoice {$invoiceId}");
    }

    public function download($invoiceId)
    {
        // Handle download invoice action
        return redirect()->back()->with('message', "Downloading invoice {$invoiceId}");
    }

    public function send($invoiceId)
    {
        // Handle send invoice action
        return redirect()->back()->with('message', "Sending invoice {$invoiceId}");
    }
}
