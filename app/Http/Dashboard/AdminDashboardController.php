<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Penerima;
use App\Models\Pengajuan;
use App\Models\Penyaluran;
use App\Models\Berita;

class AdminDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $totalUser         = User::count();

        $totalPenerima     = Penerima::count();

        $totalPengajuan    = Pengajuan::count();

        $totalPenyaluran   = Penyaluran::count();

        $totalBerita       = Berita::count();

        $pengajuanTerbaru  = Pengajuan::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalUser',
            'totalPenerima',
            'totalPengajuan',
            'totalPenyaluran',
            'totalBerita',
            'pengajuanTerbaru'
        ));
    }
}