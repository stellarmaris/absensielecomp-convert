<?php

namespace App\Controllers;

use App\Models\UserModel;

class TroubleSignInController extends BaseController
{
    public function index()
    {
        return view('troublesignin');
    }
}
