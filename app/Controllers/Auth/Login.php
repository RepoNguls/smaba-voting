<?php

namespace App\Controllers\Auth;

use App\Models\Auth;

class Login extends AuthController
{
    public function index()
    {
        return view("auth\login");
    }

    public function login()
    {
        $request = \Config\Services::request();
        $waktu_login = now('Asia/Makassar');
        //$waktu_login = date('yy-m-d H:i:s');   // Outputs: 20-01-20 17:04:00
        $model = new Auth();
        $data = array(
            'username' => $request->getPost('username'),
            'password' => $request->getPost('password'),
        );
        $result = $model->login_siswa($data);
        if ($result) {
            if ($result['is_active'] == 0) {
                $this->session->setFlashdata('login_warning', 'User tidak aktif.');
                return redirect()->to(base_url('/'));
            } else {
                $admin_data = array(
                    'id_peserta' => $result['id_peserta'],
                    'username' => $result['username'],
                    'is_siswa_login' => TRUE, //kedepan ini di ganti sesuai kebutuhan
                    'is_login' => true
                );
                $data = array(
                    'last_login' => $waktu_login,
                );
                $model->save_waktu($data, $result['id_peserta']);
                $this->session->set($admin_data);
                return redirect()->to(base_url('user'));
            }
        } else {
            $this->session->setFlashdata('login_error', 'User name atau password salah.');
            return redirect()->to(base_url('/login'));
        }
    }
}
