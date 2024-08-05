<?php

namespace App\Controllers;

class lokasiController extends BaseController
{

    public function index(): string
    {
        return view('lokasiAdmin');
    }
}
