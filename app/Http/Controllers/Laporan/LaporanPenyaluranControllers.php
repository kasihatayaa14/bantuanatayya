<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use Illuminate\Http\Request;

class LaporanPenyaluranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LAPORAN PENYALURAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $penyalurans = Penyaluran::with('penerima')
            ->latest()
            ->paginate(10);

        $totalPenyaluran = Penyaluran::sum('jumlah_bantuan');

        return view('admin.laporan.laporanpenyaluran', compact(
            'penyalurans',
            'totalPenyaluran'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK LAPORAN PENYALURAN
    |--------------------------------------------------------------------------
    */

    public function cetak()
    {
        $penyalurans = Penyaluran::with('penerima')
            ->latest()
            ->get();

        $totalPenyaluran = Penyaluran::sum('jumlah_bantuan');

        return view('admin.laporan.cetaklaporanpenyaluran', compact(
            'penyalurans',
            'totalPenyaluran'
        ));
    }
}