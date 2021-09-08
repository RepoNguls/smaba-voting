<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();

        if ($session->has('is_login')) {
            if ($session->has('is_siswa_login')) {
                return redirect()->to(base_url('/user'));
            }
            if ($session->has('is_admin_login')) {
                return redirect()->to(base_url('/admin'));
            }
        } else {
            return redirect()->to(base_url('/login'));
        }
    }
}
