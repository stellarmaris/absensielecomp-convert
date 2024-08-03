<?php

namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index(): string
    {
        return view('dashboardadmin');
    }
}
