<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN UTAMA LAPORAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('admin.laporan.daftarlaporan');
    }
}