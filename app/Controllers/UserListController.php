<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserListController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $ModelUser = new UserModel(); // Pastikan model ini sesuai dengan nama model user Anda

        // Konfigurasi pagination
        $perPage = 10; // Jumlah user per halaman

        // Query untuk mendapatkan data user dengan pagination
        $data['data_user'] = $ModelUser
            ->where('role', 'user')
            ->orderBy('nama', 'asc')
            ->paginate($perPage); // Menggunakan fungsi paginate

        // Generate link pagination
        $data['pager'] = $ModelUser->pager;
        $tanggalHariIni = date('Y-m-d');

        $data['tanggal_hari_ini'] = $this->getTanggalHariIni();

        $data['title'] = 'All Users';
        return view('user_list', $data);
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
    public function detail($id_magang)
    {
        $ModelUser = new UserModel();

        // Dapatkan data user berdasarkan id_magang
        $data['user'] = $ModelUser
            ->where('id_magang', $id_magang)
            ->first();

        if (!$data['user']) {
            return redirect()->to(site_url('dashboardadmin'))->with('error', 'Data pengguna tidak ditemukan.');
        }

        $data['title'] = 'Detail Pengguna';
        return view('detailuser', $data);
    }

    public function edit($id)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/user-list')->with('error', 'User not found');
        }

        // Define the title and pass it to the view
        $data = [
            'title' => 'Edit Profil',
            'user' => $user,
        ];

        return view('useredit', $data);
    }



    public function update($id)
    {

        $userModel = new UserModel();

        $rules = [
            'nama' => [
                'label' => 'Nama lengkap',
                'rules' => 'permit_empty|min_length[3]|max_length[255]',
                'errors' => [
                    'min_length' => '{field} minimal 3 karakter.',
                    'max_length' => '{field} maksimal 255 karakter'
                ]
            ],
            'telepon' => [
                'label' => 'Nomor telepon',
                'rules' => 'permit_empty|min_length[10]|max_length[15]',
                'errors' => [
                    'min_length' => '{field} minimal 10 karakter.',
                    'max_length' => '{field} maksimal 15 karakter'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'permit_empty|min_length[8]|regex_match[/(?=.*[0-9])(?=.*[\W])/]',
                'errors' => [
                    'min_length' => '{field} minimal 8 karakter.',
                    'regex_match' => '{field} harus terdiri dari huruf, angka, dan karakter spesial (@,#,!,?, dll).'
                ]
            ],
        ];

        if ($this->validate($rules)) {
            $dataUser = [
                'Nama' => $this->request->getPost('nama'),
                'Nomor_telepon' => $this->request->getPost('telepon'),
                'alamat' => $this->request->getPost('alamat'),
            ];

            if ($this->request->getPost('password')) {
                $dataUser['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            }

            // Debug dataUser
            // dd($dataUser, $id);

            $userModel->update($id, $dataUser);

            return redirect()->to('/user-list');
        }
    }
}
