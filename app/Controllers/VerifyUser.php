<?php

namespace App\Controllers;

use App\Models\presensiModel;

class VerifyUser extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        $ModelPresensi = new presensiModel();

        // Gunakan pagination
        $pagination = $this->paginateData();
        $data['data_presensi'] = $ModelPresensi
            ->select('presensi.*, user.nama as Nama')
            ->join('user', 'user.id_magang = presensi.id_magang')
            ->orderBy('tanggal', 'desc')
            ->findAll($pagination['perPage'], $pagination['offset']);

        $data = array_merge($data, $pagination); // Gabungkan data pagination ke $data

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        $data['title'] = 'Verify User';
        return view('verifyuser', $data);
    }

    private function paginateData(?string $tanggal = null): array
    {
        $ModelPresensi = new presensiModel();
        $perPage = 10;

        // Dapatkan nomor halaman saat ini
        $page = $this->request->getVar('page') ?? 1;

        // Hitung offset
        $offset = ($page - 1) * $perPage;

        // Hitung total data
        if ($tanggal) {
            $totalRecords = $ModelPresensi->where('tanggal', $tanggal)->countAllResults();
        } else {
            $totalRecords = $ModelPresensi->countAllResults();
        }
        
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
        // Implementasi sama seperti sebelumnya
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

    public function delete($id_presensi)
    {
        $ModelPresensi = new presensiModel();
        $ModelPresensi->delete($id_presensi);
        
        return redirect()->to(site_url('dashboardadmin'))->with('success', 'Data berhasil dihapus.');
    }
}
