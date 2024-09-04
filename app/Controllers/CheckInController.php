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
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $idMagang = session()->get('user_id');

        // Fetch additional user data if needed
        $userModel = new UserModel();
        $userData = $userModel->find($idMagang);

        // Merge session data with additional data (if any)
        $data = array_merge(session()->get(), $userData);

        // Add title data
        $data['title'] = 'Dashboard';

        // Get form data
        $date = $this->request->getPost('date');
        $time = $this->request->getPost('time');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $status = $this->request->getPost('status');

        // Target location coordinates and radius
        $targetLat = -7.9742781;
        $targetLong = 112.665592;
        $radius = 1000; // Radius in meters

        // Function to convert degrees to radians
        function deg2rad($deg)
        {
            return $deg * (M_PI / 180);
        }

        // Function to calculate distance between two coordinates using the Haversine formula
        function haversine($lat1, $lon1, $lat2, $lon2)
        {
            $earthRadius = 6371000; // Earth radius in meters

            $dLat = deg2rad($lat2 - $lat1);
            $dLong = deg2rad($lon2 - $lon1);

            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
                sin($dLong / 2) * sin($dLong / 2);

            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

            $distance = $earthRadius * $c;

            return $distance;
        }

        // Calculate the distance between the current and target locations
        $distance = haversine($latitude, $longitude, $targetLat, $targetLong);

        // Check if the distance is within the specified radius
        if ($distance <= $radius) {
            $verifikasiStatus = 'Sukses';
        } else {
            $verifikasiStatus = 'Pending';
        }

        $PresensiModel = new PresensiModel();

        // Check if the user has already checked in today
        $existingCheckIn = $PresensiModel->where('id_magang', $idMagang)
            ->where('tanggal', $date)
            ->where('status', 'hadir')
            ->first();

        if ($existingCheckIn) {
            // If the user has already checked in, redirect with an error message
            return redirect()->back()->with('error', 'Anda sudah melakukan check-in hari ini.');
        }

        // Handle file upload
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Check file extension
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $fileExtension = $foto->getExtension();

            if (in_array($fileExtension, $allowedExtensions)) {
                $newName = $foto->getRandomName(); // Generate random file name
                $foto->move('uploads/photos', $newName); // Move to the uploads/photos directory

                // Create the data array with the path to the uploaded photo
                $data = [
                    'id_magang' => $idMagang,
                    'status' => 'hadir',
                    'tanggal' => $date,
                    'jam_masuk' => $time,
                    'checkIn_latitude' => $latitude,
                    'checkin_longitude' => $longitude,
                    'verifikasi' => $verifikasiStatus,
                    'foto' => $newName // Save the path to the database
                ];

                // Simpan data ke database
                $PresensiModel->save($data);

                // Cek status verifikasi dan arahkan ke rute yang sesuai
                if ($verifikasiStatus === 'Sukses') {
                    return redirect()->to('/success-check-in')->with('success', 'Presensi berhasil disimpan.');
                } else {
                    return redirect()->to('/pending-check-in')->with('warning', 'Verifikasi sedang diproses.');
                }
            } else {
                // Handle error if the file extension is not allowed
                return redirect()->back()->with('error', 'Format file tidak didukung. Hanya .jpg, .jpeg, dan .png yang diperbolehkan.');
            }
        } else {
            // Handle error if the file is not valid
            return redirect()->back()->with('error', 'Foto tidak valid atau gagal diunggah.');
        }
    }
}
