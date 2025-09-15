<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Config\Roles;

class Auth extends BaseController
{
	public function login()
	{
		$session = session();
		if ($session->get('isLoggedIn')) {
			$role = $session->get('role');
			if ($role === 'sys_admin') {
				return redirect()->to('it/dashboard');
			}
			if (in_array($role, Roles::adminRoles(), true)) {
				return redirect()->to('admin/dashboard');
			}
			if ($role === 'inventory_staff') {
				return redirect()->to('inventory/dashboard');
			}
			if ($role === 'supplier') {
				return redirect()->to('supplier/dashboard');
			}
		}
		return view('auth/login', [
			'error' => $session->getFlashdata('error'),
			'oldEmail' => old('email'),
		]);
	}

	public function attempt()
	{
		$session = session();
		$validation = service('validation');
		$validation->setRules([
			'email' => 'required|valid_email',
			'password' => 'required|min_length[4]',
		]);
		if (!$validation->withRequest($this->request)->run()) {
			$session->setFlashdata('error', 'Please provide a valid email and password.');
			return redirect()->back()->withInput();
		}

		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		$model = new UserModel();
		$user = $model->findByEmail($email);
		if (!$user || !password_verify($password, $user['password_hash'])) {
			$session->setFlashdata('error', 'Invalid credentials.');
			return redirect()->back()->withInput();
		}

		$role = $user['role'] ?? '';
		
		// Set session data
		$sessionData = [
			'userId' => $user['id'],
			'userName' => $user['name'],
			'email' => $user['email'],
			'role' => $user['role'],
			'isLoggedIn' => true,
		];

		// Add supplier-specific session data
		if ($role === 'supplier') {
			$sessionData['company_name'] = $user['company_name'] ?? 'ABC Suppliers Ltd.';
			$sessionData['user_initials'] = $this->generateInitials($user['name']);
		}

		$session->set($sessionData);

		// Redirect based on role
		if ($role === 'sys_admin') {
			return redirect()->to('it/dashboard');
		} elseif (in_array($role, Roles::adminRoles(), true)) {
			return redirect()->to('admin/dashboard');
		} elseif ($role === 'inventory_staff') {
			return redirect()->to('inventory/dashboard');
		} elseif ($role === 'supplier') {
			return redirect()->to('supplier/dashboard');
		} else {
			$session->setFlashdata('error', 'You are not authorized to access this system.');
			return redirect()->back()->withInput();
		}
	}

	private function generateInitials($name)
	{
		$words = explode(' ', $name);
		$initials = '';
		foreach ($words as $word) {
			if (!empty($word)) {
				$initials .= strtoupper(substr($word, 0, 1));
			}
		}
		return substr($initials, 0, 2);
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('login');
	}
}


