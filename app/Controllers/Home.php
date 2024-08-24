<?php

namespace App\Controllers;

use App\Models\presensiModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        // Ambil data user dari UserModel
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // Ambil model Presensi
        $presensiModel = new presensiModel();

        // Periksa apakah user sudah melakukan check-in atau tidak hadir pada hari ini
        $today = date('Y-m-d');
        $presensi = $presensiModel->where('id_magang', $userId)
            ->where('tanggal', $today)
            ->first();

        // Cek apakah sudah ada presensi dan apakah jam_keluar sudah terisi
        $hasPresensi = $presensi ? true : false;
        $hasCheckedOut = $presensi && $presensi['jam_keluar'] ? true : false;

        // Data array yang akan dikirim ke view
        $data = [
            'nama' => $userData['Nama'], // pass data Nama
            'hasPresensi' => $hasPresensi, // Cek apakah ada data presensi
            'hasCheckedOut' => $hasCheckedOut, // Cek apakah sudah check-out
        ];
        $data['title'] = 'Dashboard';
        return view('dashboarduser', $data);
    }
}
