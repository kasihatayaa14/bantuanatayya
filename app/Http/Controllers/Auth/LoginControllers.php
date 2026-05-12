<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN USER
    |--------------------------------------------------------------------------
    */

    public function loginUserForm()
    {
        return view('auth.login-user');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN USER ADMIN / PETUGAS
    |--------------------------------------------------------------------------
    */

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            /*
            |--------------------------------------------------------------------------
            | ROLE REDIRECT
            |--------------------------------------------------------------------------
            */

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role == 'petugas') {
                return redirect()->route('petugas.dashboard');
            }

            Auth::logout();

            return back()->with('error', 'Role tidak dikenali.');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    /*
    |--------------------------------------------------------------------------
    | FORM LOGIN PENERIMA
    |--------------------------------------------------------------------------
    */

    public function loginPenerimaForm()
    {
        return view('auth.login-penerima');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login-user');
    }
}