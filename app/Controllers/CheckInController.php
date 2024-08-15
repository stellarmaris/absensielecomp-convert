<?php

namespace App\Controllers;

use App\Models\presensiModel;
use App\Models\UserModel;

class CheckInController extends BaseController
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

        return view('checkin_form', $data);
    }
    public function store()
    {
        $date = $this->request->getPost('date');
        $time = $this->request->getPost('time');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $status = $this->request->getPost('status');

        $PresensiModel = new presensiModel();

        // Handle file upload
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName(); // Generate random file name
            $foto->move('uploads/photos', $newName); // Move to the uploads/photos directory

            // Create the data array with the path to the uploaded photo
            $data = [
                'id_magang' => 2,
                'status' => $status,
                'tanggal' => $date,
                'jam_masuk' => $time,
                'checkIn_latitude' => $latitude,
                'checkin_longitude' => $longitude,
                'foto' => 'uploads/photos/check-in/' . $newName // Save the path to the database
            ];

            // Save data to the database
            $PresensiModel->save($data);
        } else {
            // Handle error if the file is not valid
            return redirect()->back()->with('error', 'Foto tidak valid atau gagal diunggah.');
        }
    }
}
