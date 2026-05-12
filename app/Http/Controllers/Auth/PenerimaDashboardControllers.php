<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenerimaAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PENERIMA
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([
            'nik'       => 'required',
            'password'  => 'required',
        ]);

        $penerima = Penerima::where('nik', $request->nik)->first();

        if (!$penerima) {
            return back()->with('error', 'NIK tidak ditemukan.');
        }

        if (!Hash::check($request->password, $penerima->password)) {
            return back()->with('error', 'Password salah.');
        }

        Auth::guard('penerima')->login($penerima);

        $request->session()->regenerate();

        return redirect()->route('penerima.dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT PENERIMA
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('penerima')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.penerima.form');
    }
}