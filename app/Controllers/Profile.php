<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index(): string
    {
        return view('profileview');
    }

    // Show the profile edit view
    public function edit(): string
    {
        return view('profileedit');
    }
}
