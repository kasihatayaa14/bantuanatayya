<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use Illuminate\Http\Request;

class LaporanBulananController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORM LAPORAN BULANAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('admin.laporan.laporanbulanan');
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK LAPORAN BULANAN
    |--------------------------------------------------------------------------
    */

    public function cetak(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $penyalurans = Penyaluran::with('penerima')
            ->whereMonth('tanggal', $request->bulan)
            ->whereYear('tanggal', $request->tahun)
            ->latest()
            ->get();

        $totalPenyaluran = $penyalurans->sum('jumlah_bantuan');

        return view('admin.laporan.cetaklaporanbulanan', compact(
            'penyalurans',
            'totalPenyaluran'
        ));
    }
}