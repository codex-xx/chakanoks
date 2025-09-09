<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Purchasing extends BaseController
{
	public function index(): string
	{
		return view('admin/purchasing/index', [
			'title' => 'SCMS — Purchasing Management',
			'active' => 'purchasing',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

