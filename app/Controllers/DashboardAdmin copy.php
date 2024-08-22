<?php

namespace App\Controllers;

use App\Models\presensiModel;

class DashboardAdmin extends BaseController
{
    public function index(): string
    {
        $ModelPresensi = new presensiModel();
        $perPage = 5;

        // dapetin nomer page 
        $page = $this->request->getVar('page') ?? 1;

        // offsetnya
        $offset = ($page - 1) * $perPage;

        // ambil total buat
        $totalRecords = $ModelPresensi->countAllResults();

        // ambil data
        $data['data_presensi'] = $ModelPresensi
            ->select('presensi.*, user.nama as Nama')
            ->join('user', 'user.id_magang = presensi.id_magang')
            ->orderBy('tanggal', 'desc')
            ->findAll($perPage, $offset);

        $data['totalPages'] = ceil($totalRecords / $perPage);
        $data['currentPage'] = $page;

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        $this->rekapitulasiHariIni($data);

        return view('dashboardadmin', $data);
    }

    public function Filtertanggal(): string
    {
        $tanggal = $this->request->getGet('tanggal');
        $ModelPresensi = new presensiModel();

        if ($tanggal) {
            $data['data_presensi'] = $ModelPresensi
                ->select('presensi.*, user.nama as Nama')
                ->join('user', 'user.id_magang = presensi.id_magang')
                ->where('tanggal', $tanggal)
                ->findAll();

            $data['tanggal_pilih'] = $tanggal;
        } else {
            $data['data_presensi'] = $ModelPresensi
                ->select('presensi.*, user.nama as Nama')
                ->join('user', 'user.id_magang = presensi.id_magang')
                ->findAll();

            $data['tanggal_pilih'] = null;
        }
        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();
        $this->rekapitulasiHariIni($data);

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

    private function rekapitulasiHariIni(&$data)
    {
        $ModelPresensi = new presensiModel();
        $tanggal_hari_ini = date('Y-m-d');

        $data['total_hadir'] = $ModelPresensi->where('status', 'HADIR')->where('tanggal', $tanggal_hari_ini)->countAllResults();
        $data['total_sakit'] = $ModelPresensi->where('status', 'SAKIT')->where('tanggal', $tanggal_hari_ini)->countAllResults();
        $data['total_izin'] = $ModelPresensi->where('status', 'IZIN')->where('tanggal', $tanggal_hari_ini)->countAllResults();
    }
    public function delete($id_presensi)
    {
        $ModelPresensi = new presensiModel();
        $ModelPresensi->delete($id_presensi);
        
        return redirect()->to(site_url('dashboardadmin'))->with('success', 'Data berhasil dihapus.');
    }
    

}
