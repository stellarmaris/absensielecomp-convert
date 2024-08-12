<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function login (){
        return view('signIn');
    }
    public function verification(){
        
    }
}
