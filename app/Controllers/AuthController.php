<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('auth/register');
    }

    // Proses login
    public function processLogin()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek apakah email ditemukan di database
        $user = $model->where('email', $email)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'user_role' => $user['role'], // 'admin' atau 'customer'
                    'isLoggedIn' => true,
                ]);
                
                // Redirect berdasarkan role
                if ($user['role'] === 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/customer/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    // Proses register
    public function processRegister()
    {
        $model = new UserModel();

        // Data yang dikirimkan dari form register
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'), // 'admin' atau 'customer'
        ];

        // Simpan data pengguna ke dalam database
        $model->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Logout user
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
