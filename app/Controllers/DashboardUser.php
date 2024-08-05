<?php

namespace App\Controllers;

class DashboardUser extends BaseController
{
    public function index(): string
    {
        return view('dashboarduser');
    }

    public function signUp(): string
    {
        return view('signUp');
    }
}
