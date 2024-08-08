<?php

namespace App\Controllers;
use App\Models\presensiModel;

class historyUserController extends BaseController
{

    public function riwayat()
    {
        $ModelPresensi= new presensiModel();
        $data['data_presensi'] = $ModelPresensi->findAll();
        echo view('riwayat', $data);
    }

    public function search(){

    }
    public function filterDate(){

    }
}
