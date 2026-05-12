<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN & PETUGAS
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role == 'petugas') {
                return redirect()->route('petugas.dashboard');
            }

            Auth::logout();

            return back()->with('error', 'Role tidak valid.');
        }

        return back()->with('error', 'Login gagal.');
    }
}