<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Suppliers extends BaseController
{
	public function index(): string
	{
		return view('admin/suppliers/index', [
			'title' => 'SCMS — Supplier Management',
			'active' => 'suppliers',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

