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
        ->where('verifikasi', 'Pending')
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
    
        // Hitung total data dengan kondisi verifikasi 'Pending'
        if ($tanggal) {
            $totalRecords = $ModelPresensi
                ->where('tanggal', $tanggal)
                ->where('verifikasi', 'Pending')
                ->countAllResults();
        } else {
            $totalRecords = $ModelPresensi
                ->where('verifikasi', 'Pending')
                ->countAllResults();
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

    public function updateVerifikasi($id_presensi, $status)
    {
        $ModelPresensi = new presensiModel();
        $presensi = $ModelPresensi->find($id_presensi);
        
        if ($presensi) {
            // Set verifikasi
            $verifikasiStatus = 'Sukses';
            
            // Set 'status' ke parameter
            $newStatus = $status;
            
            // Update
            $ModelPresensi->update($id_presensi, [
                'status' => $newStatus,
                'verifikasi' => $verifikasiStatus
            ]);
        
            return redirect()->to(site_url('verifyuser'))->with('success', 'Status verifikasi dan status berhasil diperbarui.');
        }
    }

    
}