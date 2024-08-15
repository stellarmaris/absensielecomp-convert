<?php

namespace App\Controllers;

use App\Models\UserModel;

class CheckInController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('auth/login');
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
    public function store (){
        $latitude = $this->request->getPost('latitude');
        dd($latitude);
    }
}
