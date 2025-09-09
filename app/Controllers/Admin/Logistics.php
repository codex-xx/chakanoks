<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Logistics extends BaseController
{
	public function index(): string
	{
		return view('admin/logistics/index', [
			'title' => 'SCMS — Logistics Management',
			'active' => 'logistics',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

