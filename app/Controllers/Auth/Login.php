<?php

namespace App\Controllers\Auth;

class Login extends AuthController
{
    public function index()
    {
        return view("auth\login");
    }
}
