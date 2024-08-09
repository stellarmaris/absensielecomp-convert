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

    private function getTanggalHariIni(): string
    {
        $hari = date('l');
        $tanggal = date('j');
        $bulan = date('F');
        $tahun = date('Y');

        $namaHari = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        $namaBulan = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];
        return $namaHari[$hari] . ', ' . $tanggal . ' ' . $namaBulan[$bulan] . ' ' . $tahun;
    }

    public function detail(): string
    {
        return view('dashboardadminview');
    }
}


