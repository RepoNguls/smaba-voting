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
        $data['uri'] =  base_url() . "/" . $this->request->uri->getSegment(1) . "/";

        //$data['jadwal'] = $this->jadwal;
        return view('template/index', $data);
    }
}
