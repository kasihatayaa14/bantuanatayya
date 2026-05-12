<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Verifikasi;
use App\Models\Penyaluran;
use App\Models\Penerima;

class PetugasDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PETUGAS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $totalPengajuan = Pengajuan::count();

        $totalVerifikasi = Verifikasi::count();

        $totalPenyaluran = Penyaluran::count();

        $totalPenerima = Penerima::count();

        $pengajuanPending = Pengajuan::where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('petugas.dashboard.index', compact(
            'totalPengajuan',
            'totalVerifikasi',
            'totalPenyaluran',
            'totalPenerima',
            'pengajuanPending'
        ));
    }
}