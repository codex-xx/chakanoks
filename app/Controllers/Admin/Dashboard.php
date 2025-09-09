<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index(): string
	{
		return view('admin/dashboard', [
			'title' => 'SCMS — Dashboard',
			'active' => 'dashboard',
			'logoutUrl' => base_url('logout'),
		]);
	}
}


