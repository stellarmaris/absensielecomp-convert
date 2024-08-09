<?php

namespace App\Controllers;
use App\Models\presensiModel;
use App\Models\userModel;

class DashboardAdmin extends BaseController
{
    public function index(): string
    {
        $ModelPresensi = new presensiModel();
        $ModelUser = new userModel();

        $data['data_presensi'] = $ModelPresensi
            ->select('presensi.*, user.nama as Nama')
            ->join('user', 'user.id_magang = presensi.id_magang')
            ->findAll();

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        return view('dashboardadmin', $data);
    }

    public function Filtertanggal(): string
    {
        $tanggal = $this->request->getGet('tanggal');
        $ModelPresensi = new presensiModel();
        $ModelUser = new userModel();

        if ($tanggal) {
            $data['data_presensi'] = $ModelPresensi
                ->select('presensi.*, user.nama as Nama')
                ->join('user', 'user.id_magang = presensi.id_magang')
                ->where('tanggal', $tanggal)
                ->findAll();
        } else {
            $data['data_presensi'] = $ModelPresensi
                ->select('presensi.*, user.nama as Nama')
                ->join('user', 'user.id_magang = presensi.id_magang')
                ->findAll();
        }

        $data['tanggal_pilih'] = $tanggal ? $tanggal : $this->getTanggalHariIni();
        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        return view('dashboardadmin', $data);
    }

    private function getTanggalHariIni(): string
    {
        return date('Y-m-d'); 
    }
}
