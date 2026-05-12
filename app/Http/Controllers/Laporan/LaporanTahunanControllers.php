<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use Illuminate\Http\Request;

class LaporanTahunanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LAPORAN TAHUNAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('admin.laporan.laporantahunan');
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK LAPORAN TAHUNAN
    |--------------------------------------------------------------------------
    */

    public function cetak(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        $penyalurans = Penyaluran::with('penerima')
            ->whereYear('tanggal', $request->tahun)
            ->latest()
            ->get();

        $totalPenyaluran = $penyalurans->sum('jumlah_bantuan');

        return view('admin.laporan.cetaklaporantahunan', compact(
            'penyalurans',
            'totalPenyaluran'
        ));
    }
}