<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaAuthController extends Controller
{
    public function login()
    {
        return view('auth.loginpenerima');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if (Auth::guard('penerima')->attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/dashboard-penerima');
        }

        return back()->with([
            'error' => 'Email atau password penerima salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('penerima')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}