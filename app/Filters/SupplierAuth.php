<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SupplierAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        
        // Check if user has supplier role
        $role = $session->get('role');
        if ($role !== 'supplier') {
            // Redirect to appropriate dashboard based on role
            if (in_array($role, ['sys_admin', 'central_admin', 'admin'])) {
                return redirect()->to('/admin/dashboard');
            }
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No post-processing required
    }
}
