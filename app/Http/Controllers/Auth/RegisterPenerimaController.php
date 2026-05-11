<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPenerimaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM REGISTER
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('auth.register-penerima');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE REGISTER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required|unique:penerimas,nik',
            'nama'          => 'required',
            'email'         => 'required|email|unique:penerimas,email',
            'no_hp'         => 'required',
            'alamat'        => 'required',
            'password'      => 'required|min:6|confirmed',
        ]);

        Penerima::create([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'alamat'        => $request->alamat,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()
            ->route('login.penerima.form')
            ->with('success', 'Registrasi berhasil.');
    }
}