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

        // tanggal 
        $tanggalHariIni = date('Y-m-d');

        // pagination
        $pagination = $this->paginateData($tanggalHariIni);

        $data['data_presensi'] = $ModelPresensi
            ->select('presensi.*, user.nama as Nama')
            ->join('user', 'user.id_magang = presensi.id_magang')
            ->where('tanggal', $tanggalHariIni)
            ->orderBy('tanggal', 'desc')
            ->findAll($pagination['perPage'], $pagination['offset']);

        $data = array_merge($data, $pagination); // Gabung

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        $data['title'] = 'Verify User';
        return view('verifyuser', $data);
    }

    private function paginateData(?string $tanggal = null): array
    {
        $ModelPresensi = new presensiModel();
        $perPage = 10;

        // fetch halaman
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

    public function updateVerifikasi($id_presensi)
    {
        $ModelPresensi = new presensiModel();
        $presensi = $ModelPresensi->find($id_presensi);
    
        if ($presensi) {
            $newStatus = ($presensi['verifikasi'] == 'Pending') ? 'Sukses' : 'Pending';
            $ModelPresensi->update($id_presensi, ['verifikasi' => $newStatus]);
    
            return redirect()->to(site_url('verifyuser'))->with('success', 'Status verifikasi berhasil diperbarui.');
        }
    
    }
    
}
