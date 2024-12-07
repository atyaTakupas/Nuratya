<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Mengecek apakah pengguna memiliki role yang sesuai
        $session = session();
        $role = $session->get('user_role');
        
        // Mendapatkan role yang diizinkan dari parameter filter
        $allowedRoles = $arguments;
        
        // Jika role pengguna tidak termasuk dalam allowedRoles, redirect ke halaman sesuai role
        if (!in_array($role, $allowedRoles)) {
            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard'); // Redirect ke dashboard admin jika role admin
            } else {
                return redirect()->to('/customer/dashboard'); // Redirect ke dashboard customer jika role customer
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada tindakan yang perlu dilakukan setelah request
    }
}
