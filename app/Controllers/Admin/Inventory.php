<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function index(): string
	{
		return view('admin/inventory/index', [
			'title' => 'SCMS — Inventory Management',
			'active' => 'inventory',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

