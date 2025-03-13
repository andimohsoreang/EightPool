<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function doShowLoginForm()
    {
        return view('auth.loginPage');
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}
