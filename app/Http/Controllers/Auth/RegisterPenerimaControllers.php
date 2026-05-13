<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penerima;
use Illuminate\Support\Facades\Hash;

class RegisterPenerimaController extends Controller
{
    public function index()
    {
        return view('auth.registerpenerima');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email|unique:penerimas,email',
            'password'  => 'required|min:6',
        ]);

        Penerima::create([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        return redirect('/login-penerima')
            ->with('success', 'Registrasi berhasil');
    }
}