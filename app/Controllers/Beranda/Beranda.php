<?php

namespace App\Controllers\Beranda;

class Beranda extends BerandaController
{
    public function index()
    {
        return view("beranda\home");
    }
}
