<?php

namespace App\Controllers\Supplier;

use App\Controllers\BaseController;

class ProductCatalog extends BaseController
{
    public function index(): string
    {
        // Sample product catalog data - in real implementation, this would come from database
        $data = [
            'title' => 'SCMS Supplier Portal',
            'active' => 'product-catalog',
            'company_name' => session()->get('company_name') ?? 'ABC Suppliers Ltd.',
            'user_initials' => session()->get('user_initials') ?? 'AS',
            'view_mode' => $this->request->getGet('view') ?? 'grid',
            'kpis' => [
                'active_products' => [
                    'value' => '4',
                    'icon' => '✅',
                    'color' => 'green',
                    'label' => 'Active Products'
                ],
                'low_stock' => [
                    'value' => '1',
                    'icon' => '🏠',
                    'color' => 'yellow',
                    'label' => 'Low Stock'
                ],
                'out_of_stock' => [
                    'value' => '1',
                    'icon' => '❌',
                    'color' => 'red',
                    'label' => 'Out of Stock'
                ],
                'total_value' => [
                    'value' => '$14,965',
                    'icon' => '💰',
                    'color' => 'blue',
                    'label' => 'Total Value'
                ]
            ],
            'products' => [
                [
                    'id' => 'PROD-001',
                    'name' => 'Office Chair - Executive',
                    'category' => 'Furniture',
                    'price' => '$299.99',
                    'stock' => 15,
                    'status' => 'active',
                    'status_class' => 'active',
                    'image' => 'chair.jpg',
                    'description' => 'High-quality executive office chair with lumbar support',
                    'sku' => 'OC-EXE-001',
                    'weight' => '25 lbs'
                ],
                [
                    'id' => 'PROD-002',
                    'name' => 'Desk Lamp - LED',
                    'category' => 'Lighting',
                    'price' => '$89.99',
                    'stock' => 3,
                    'status' => 'low_stock',
                    'status_class' => 'low-stock',
                    'image' => 'lamp.jpg',
                    'description' => 'Energy-efficient LED desk lamp with adjustable brightness',
                    'sku' => 'DL-LED-002',
                    'weight' => '2.5 lbs'
                ],
                [
                    'id' => 'PROD-003',
                    'name' => 'Wireless Mouse',
                    'category' => 'Electronics',
                    'price' => '$45.99',
                    'stock' => 0,
                    'status' => 'out_of_stock',
                    'status_class' => 'out-of-stock',
                    'image' => 'mouse.jpg',
                    'description' => 'Ergonomic wireless mouse with precision tracking',
                    'sku' => 'WM-ERG-003',
                    'weight' => '0.3 lbs'
                ],
                [
                    'id' => 'PROD-004',
                    'name' => 'Monitor Stand - Adjustable',
                    'category' => 'Accessories',
                    'price' => '$129.99',
                    'stock' => 8,
                    'status' => 'active',
                    'status_class' => 'active',
                    'image' => 'stand.jpg',
                    'description' => 'Height-adjustable monitor stand with cable management',
                    'sku' => 'MS-ADJ-004',
                    'weight' => '8.5 lbs'
                ]
            ]
        ];

        return view('supplier/product-catalog', $data);
    }

    public function add()
    {
        // Handle add product action
        return redirect()->back()->with('message', 'Add product functionality coming soon');
    }

    public function edit($productId)
    {
        // Handle edit product action
        return redirect()->back()->with('message', "Editing product {$productId}");
    }

    public function delete($productId)
    {
        // Handle delete product action
        return redirect()->back()->with('message', "Product {$productId} deleted");
    }
}
