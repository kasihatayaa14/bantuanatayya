<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Penyaluran;
use Illuminate\Support\Facades\Auth;

class PenerimaDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PENERIMA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $penerima = Auth::guard('penerima')->user();

        $totalPengajuan = Pengajuan::where('penerima_id', $penerima->id)
            ->count();

        $pengajuanDisetujui = Pengajuan::where('penerima_id', $penerima->id)
            ->where('status', 'disetujui')
            ->count();

        $pengajuanPending = Pengajuan::where('penerima_id', $penerima->id)
            ->where('status', 'pending')
            ->count();

        $riwayatPenyaluran = Penyaluran::where('penerima_id', $penerima->id)
            ->latest()
            ->take(5)
            ->get();

        return view('penerima.dashboard.index', compact(
            'penerima',
            'totalPengajuan',
            'pengajuanDisetujui',
            'pengajuanPending',
            'riwayatPenyaluran'
        ));
    }
}