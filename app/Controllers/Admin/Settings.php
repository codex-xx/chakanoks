<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Settings extends BaseController
{
	public function index(): string
	{
		return view('admin/settings/index', [
			'title' => 'SCMS — System Settings',
			'active' => 'settings',
			'logoutUrl' => base_url('logout'),
		]);
	}
}

