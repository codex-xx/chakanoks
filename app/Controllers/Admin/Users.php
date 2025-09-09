<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Config\Roles;

class Users extends BaseController
{
	public function index(): string
	{
		$model = new UserModel();
		$users = $model->orderBy('created_at', 'DESC')->findAll();
		return view('admin/users/index', [
			'title' => 'Users',
			'active' => 'users',
			'users' => $users,
			'roles' => Roles::labels(),
		]);
	}

	public function store()
	{
		$validation = service('validation');
		$validation->setRules([
			'name' => 'required|min_length[3]',
			'email' => 'required|valid_email|is_unique[users.email]',
			'password' => 'required|min_length[6]',
			'role' => 'required',
		]);
		if (!$validation->withRequest($this->request)->run()) {
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->back()->withInput();
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'email' => $this->request->getPost('email'),
			'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			'role' => $this->request->getPost('role'),
		];
		$model = new UserModel();
		$model->insert($data);
		session()->setFlashdata('message', 'User created successfully.');
		return redirect()->to(site_url('admin/users'));
	}

	public function update(int $id)
	{
		$model = new UserModel();
		$user = $model->find($id);
		if (!$user) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('User not found');
		}

		$rules = [
			'name' => 'required|min_length[3]',
			'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
			'role' => 'required',
		];
		if ($this->request->getPost('password')) {
			$rules['password'] = 'min_length[6]';
		}
		$validation = service('validation');
		$validation->setRules($rules);
		if (!$validation->withRequest($this->request)->run()) {
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->back()->withInput();
		}

		$data = [
			'name' => $this->request->getPost('name'),
			'email' => $this->request->getPost('email'),
			'role' => $this->request->getPost('role'),
		];
		if ($this->request->getPost('password')) {
			$data['password_hash'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
		}
		$model->update($id, $data);
		session()->setFlashdata('message', 'User updated successfully.');
		return redirect()->to(site_url('admin/users'));
	}

	public function delete(int $id)
	{
		$model = new UserModel();
		$model->delete($id);
		session()->setFlashdata('message', 'User deleted.');
		return redirect()->to(site_url('admin/users'));
	}
}


