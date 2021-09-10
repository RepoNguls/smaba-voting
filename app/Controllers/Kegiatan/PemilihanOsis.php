<?php

namespace App\Controllers\Kegiatan;

use App\Controllers\Kegiatan\KegiatanController;
use App\Models\KegiatanModel;

class PemilihanOsis extends KegiatanController
{
    public function index()
    {
        $namaKegiatan = 'pemilihan-osis';
        $model = new KegiatanModel();
        $result = $model->checkDataKegiatan($namaKegiatan);
        if ($result == 0) {
            return redirect()->to(base_url('user'));
        } else {
            $data['dataKegiatan'] = $model->checkDataKegiatanActive($namaKegiatan);
            $data['kegiatan'] = $this->kegiatan;
            $data['view'] = 'kegiatan/pemilihan-osis';
            $data['user'] = $this->user_name;
            $data['URL'] = $namaKegiatan;
            $data['calon'] = $this->calonOsis->getAllKandidat();
            $data['uri'] =  base_url() . "/" . $this->request->uri->getSegment(1) . "/";
            $data['hasilPemilihan'] = $this->pemilihanOsis->hasilPemilihan();
            //dd($data['hasilPemilihan']);
            if ($this->user_name['kegiatan']) {
                $pilihan = $this->pemilihanOsis->getPilihan($this->user_name['username']);
                $data['pilihan'] = $this->calonOsis->getByID($pilihan['pilihan_id']);
            }

            //$data['jadwal'] = $this->jadwal;
            return view('template/index', $data);
        }
    }

    public function pilih()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data = array(
                'username' => $this->user_name['username'],
                'kelas' => $this->user_name['kelas'],
                'pilihan_id' => $request->getPost('pilihan'),
            );
            $data2 = array(
                'kegiatan' => 1
            );
            $this->pemilihanOsis->save_pilih($data, $this->user_name['username']);
            $this->UserModel->update_pemilih($data2, $this->user_name['username']);
            echo "berhasil " . $request->getPost('pilihan');
        }
        // return redirect()->back();
    }

    public function ganti()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $data2 = array(
                'kegiatan' => 0
            );
            $this->UserModel->update_pemilih($data2, $this->user_name['username']);
            echo "berhasil " . $request->getPost('pilihan');
        }
        // return redirect()->back();
    }
}
