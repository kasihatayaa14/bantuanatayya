<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Verifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiController extends Controller
{
    public function index()
    {
        $verifikasis = Verifikasi::with([
            'pengajuan',
            'user'
        ])->latest()->paginate(10);

        return view('admin.verifikasi.index', compact('verifikasis'));
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('admin.verifikasi.show', compact('pengajuan'));
    }

    public function verifikasi(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'status_verifikasi' => 'required',
            'catatan'           => 'nullable',
        ]);

        Verifikasi::create([
            'pengajuan_id'        => $pengajuan->id,
            'user_id'             => Auth::id(),
            'status_verifikasi'   => $request->status_verifikasi,
            'catatan'             => $request->catatan,
        ]);

        $pengajuan->update([
            'status' => $request->status_verifikasi,
        ]);

        return redirect()->route('verifikasi.index')
            ->with('success', 'Verifikasi berhasil dilakukan.');
    }
}