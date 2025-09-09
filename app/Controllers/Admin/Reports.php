<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Reports extends BaseController
{
	public function index(): string
	{
		return view('admin/reports/index', [
			'title' => 'SCMS — Reports & Analytics',
			'active' => 'reports',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

