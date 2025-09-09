<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class Contracts extends BaseController
{
    public function index(): string
    {
        // Sample contracts & terms data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'contracts',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'active_tab' => $this->request->getGet('tab') ?? 'contracts',
            'kpis' => [
                'active_contracts' => [
                    'value' => '2',
                    'icon' => '📄',
                    'color' => 'green',
                    'label' => 'Active Contracts'
                ],
                'pending_renewal' => [
                    'value' => '1',
                    'icon' => '🔄',
                    'color' => 'yellow',
                    'label' => 'Pending Renewal'
                ],
                'total_value' => [
                    'value' => '$470,000',
                    'icon' => '💰',
                    'color' => 'blue',
                    'label' => 'Total Value'
                ],
                'avg_contract_value' => [
                    'value' => '$117,500',
                    'icon' => '📊',
                    'color' => 'purple',
                    'label' => 'Avg Contract Value'
                ]
            ],
            'contracts' => [
                [
                    'id' => 'CON-2024-001',
                    'name' => 'Annual Supply Agreement - Downtown Branch',
                    'branch' => 'Downtown Branch',
                    'start_date' => '2024-01-01',
                    'end_date' => '2024-12-31',
                    'auto_renewal' => 'Yes',
                    'status' => 'Active',
                    'status_class' => 'active',
                    'value' => '$150,000',
                    'products' => ['Fresh Produce', 'Dairy Products'],
                    'description' => 'Annual supply agreement for fresh produce and dairy products'
                ],
                [
                    'id' => 'CON-2024-002',
                    'name' => 'Quarterly Contract - Mall Branch',
                    'branch' => 'Mall Branch',
                    'start_date' => '2024-01-01',
                    'end_date' => '2024-03-31',
                    'auto_renewal' => 'No',
                    'status' => 'Pending Renewal',
                    'status_class' => 'pending-renewal',
                    'value' => '$45,000',
                    'products' => ['Beverages', 'Snacks'],
                    'description' => 'Quarterly contract for beverages and snacks'
                ],
                [
                    'id' => 'CON-2024-003',
                    'name' => 'Monthly Supply Contract - Airport Branch',
                    'branch' => 'Airport Branch',
                    'start_date' => '2024-02-01',
                    'end_date' => '2024-12-31',
                    'auto_renewal' => 'Yes',
                    'status' => 'Active',
                    'status_class' => 'active',
                    'value' => '$275,000',
                    'products' => ['Meat Products', 'Frozen Foods', 'Beverages'],
                    'description' => 'Monthly supply contract for meat products and frozen foods'
                ],
                [
                    'id' => 'CON-2024-004',
                    'name' => 'Service Agreement - City Center Branch',
                    'branch' => 'City Center Branch',
                    'start_date' => '2024-01-15',
                    'end_date' => '2024-07-15',
                    'auto_renewal' => 'No',
                    'status' => 'Active',
                    'status_class' => 'active',
                    'value' => '$75,000',
                    'products' => ['Cleaning Supplies', 'Office Materials'],
                    'description' => 'Service agreement for cleaning supplies and office materials'
                ]
            ],
            'terms_policies' => [
                [
                    'title' => 'Payment Terms',
                    'description' => 'Net 30 days payment terms for all invoices',
                    'type' => 'Payment',
                    'status' => 'Active'
                ],
                [
                    'title' => 'Delivery Requirements',
                    'description' => 'All deliveries must be completed within 48 hours of order confirmation',
                    'type' => 'Delivery',
                    'status' => 'Active'
                ],
                [
                    'title' => 'Quality Standards',
                    'description' => 'All products must meet FDA quality standards and certifications',
                    'type' => 'Quality',
                    'status' => 'Active'
                ]
            ]
        ];

        return view('supplier/contracts', $data);
    }

    public function view($contractId)
    {
        // Handle view contract action
        return redirect()->back()->with('message', "Viewing contract {$contractId}");
    }

    public function download($contractId)
    {
        // Handle download contract action
        return redirect()->back()->with('message', "Downloading contract {$contractId}");
    }

    public function renew($contractId)
    {
        // Handle renew contract action
        return redirect()->back()->with('message', "Renewing contract {$contractId}");
    }

    public function create()
    {
        // Handle create new contract action
        return redirect()->back()->with('message', 'Create new contract functionality coming soon');
    }
}
