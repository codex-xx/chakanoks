<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Franchising extends BaseController
{
	public function index(): string
	{
		return view('admin/franchising/index', [
			'title' => 'SCMS — Franchising Management',
			'active' => 'franchising',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

