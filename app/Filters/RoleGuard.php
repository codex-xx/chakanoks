<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleGuard implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		$session = session();
		if (!$session->get('isLoggedIn')) {
			return redirect()->to('/login');
		}
		if (!empty($arguments)) {
			$role = $session->get('role');
			if (!in_array($role, $arguments, true)) {
				return redirect()->to('/login');
			}
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}
}


