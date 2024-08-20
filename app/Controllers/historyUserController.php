<?php

namespace App\Controllers;
use App\Models\presensiModel;

class historyUserController extends BaseController
{

    public function riwayat($id_magang)
    {
        $ModelPresensi= new presensiModel();
        $tanggal = $this->request->getGet('tanggal');
        $page = $this->request->getGet('page') ?? 1;
        $perPage=2;

        $total = $ModelPresensi->getJumlahPresensi($id_magang,$tanggal);
        $offset=($page -1)*$perPage;

         // $data['data_presensi'] = $ModelPresensi->findAll();
        $data['data_presensi'] = $ModelPresensi->getPresensiUser($id_magang,$tanggal, $perPage,$offset);
        $data['id_magang']= $id_magang;
        $data['tanggal'] = $tanggal;
        $data['title'] = 'Riwayat';
        $pager = \Config\Services::pager();
        $data['pager'] = $pager->makeLinks($page,$perPage, $total,'custom');
        echo view('riwayat', $data);
    }

  
}
