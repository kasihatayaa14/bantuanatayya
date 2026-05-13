<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('auth.loginuser');
    }

    public function prosesLogin(Request $request)
    {
        return "Login berhasil";
    }
}