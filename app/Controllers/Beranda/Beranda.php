<?php

namespace App\Controllers\Beranda;

class Beranda extends BerandaController
{
    public function index()
    {
        $data['kegiatan'] = $this->kegiatan;
        $data['view'] = 'beranda/home';
        $data['user'] = $this->user_name;
        $data['URL'] = 'beranda';
        //$data['jadwal'] = $this->jadwal;
        return view('template/index', $data);
    }
}
