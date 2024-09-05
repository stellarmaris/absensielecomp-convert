<?php

namespace App\Controllers;

use App\Models\presensiModel;
use App\Models\UserModel;

class dashboardadmin extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $ModelPresensi = new presensiModel();

        // Dapatkan tanggal hari ini
        $tanggalHariIni = date('Y-m-d');

        // Gunakan pagination
        $pagination = $this->paginateData();
        $data['data_presensi'] = $ModelPresensi
            ->select('presensi.*, user.nama as Nama')
            ->join('user', 'user.id_magang = presensi.id_magang')
            ->where('tanggal', $tanggalHariIni)
            ->orderBy('tanggal', 'desc')
            ->findAll($pagination['perPage'], $pagination['offset']);

        $data = array_merge($data, $pagination); // Gabungkan data pagination ke $data

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();
        $this->rekapitulasiHariIni($data);
        
        $data['total_user'] = $this->getTotalUser();
        
        $data['title'] = 'Dashboard Admin';
        return view('dashboardadmin', $data);
    }

    private function paginateData(): array
    {
        $ModelPresensi = new presensiModel();
        $perPage = 5;
    
        // Dapatkan nomor halaman saat ini
        $page = $this->request->getVar('page') ?? 1;
    
        // Hitung offset
        $offset = ($page - 1) * $perPage;
    
        // Hitung total data
        $totalRecords = $ModelPresensi->where('tanggal', date('Y-m-d'))->countAllResults();
    
        // Hitung total halaman
        $totalPages = ceil($totalRecords / $perPage);
    
        // Kembalikan data pagination
        return [
            'perPage' => $perPage,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'offset' => $offset
        ];
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

    private function rekapitulasiHariIni(&$data)
    {
        $ModelPresensi = new presensiModel();
        $tanggal_hari_ini = date('Y-m-d');

        $data['total_hadir'] = $ModelPresensi->where('status', 'HADIR')->where('tanggal', $tanggal_hari_ini)->countAllResults();
        $data['total_sakit'] = $ModelPresensi->where('status', 'SAKIT')->where('tanggal', $tanggal_hari_ini)->countAllResults();
        $data['total_izin'] = $ModelPresensi->where('status', 'IZIN')->where('tanggal', $tanggal_hari_ini)->countAllResults();
        $data['total_rekap'] = $data['total_hadir'] + $data['total_sakit'] + $data['total_izin'];

    }
    
    private function getTotalUser(): int
    {
        $ModelUser = new UserModel();
        return $ModelUser->where('role', 'user')->countAllResults();
    }

}