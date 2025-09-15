<?php

namespace App\Controllers\Inventory;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('inventory/dashboard', [
            'title' => 'SCMS — Inventory Dashboard',
            'active' => 'inventory_dashboard',
        ]);
    }
}

?>


