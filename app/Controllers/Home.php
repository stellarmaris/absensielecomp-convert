<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('auth/login');
        }

        $userId = session()->get('user_id');

        // Ambil data user dari usermodel
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // data array
        $data = [
            'nama' => $userData['Nama'], // pass data Nama
        ];

        // Add title data
        $data['title'] = 'Dashboard';

        return view('dashboarduser', $data);
    }
}
