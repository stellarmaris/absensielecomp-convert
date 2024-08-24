<?php

namespace App\Controllers;

use App\Models\presensiModel;
use App\Models\UserModel;

class IzinController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        // Fetch additional user data if needed
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // Merge session data with additional data (if any)
        $data = array_merge(session()->get(), $userData);

        // Add title data
        $data['title'] = 'Dashboard';

        return view('izin_form', $data);
    }
    public function store()
    {
        $idMagang = session()->get('user_id');
        $date = $this->request->getPost('date');
        $time = $this->request->getPost('time');
        $status = $this->request->getPost('status');

        if (!$date || !$time || !$status) {
            return redirect()->back()->with('error', 'All fields are required.');
        }

        if (!$this->validate([
            'foto' => 'uploaded[foto]|max_size[foto,1024]|ext_in[foto,png,jpg,jpeg]'
        ])) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('foto');
        $newName = $file->getRandomName();
        $file->move('uploads', $newName);

        $UserModel = new presensiModel();

        $data = [
            'id_magang' => $idMagang,
            'tanggal' => $date,
            'jam_masuk' => $time,
            'status' => $status,
            'foto' => 'uploads/' . $newName
        ];

        // Try to save the data
        if ($UserModel->save($data)) {
            // Simpan status izin ke dalam sesi
            session()->setFlashdata('status_izin', $status);

            // Redirect ke halaman sukses
            return redirect()->to('/success-izin');
        } else {
            return redirect()->back()->with('error', 'Failed to save data.');
        }
    }
}
