<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use App\Models\Penerima;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    public function index()
    {
        $penyalurans = Penyaluran::with('penerima')
            ->latest()
            ->paginate(10);

        return view('admin.penyaluran.index', compact('penyalurans'));
    }

    public function create()
    {
        $penerimas = Penerima::all();

        return view('admin.penyaluran.create', compact('penerimas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id'      => 'required',
            'tanggal'          => 'required',
            'jumlah_bantuan'   => 'required',
            'keterangan'       => 'required',
        ]);

        Penyaluran::create([
            'penerima_id'      => $request->penerima_id,
            'tanggal'          => $request->tanggal,
            'jumlah_bantuan'   => $request->jumlah_bantuan,
            'keterangan'       => $request->keterangan,
        ]);

        return redirect()->route('penyaluran.index')
            ->with('success', 'Penyaluran berhasil ditambahkan.');
    }

    public function show(Penyaluran $penyaluran)
    {
        return view('admin.penyaluran.show', compact('penyaluran'));
    }

    public function edit(Penyaluran $penyaluran)
    {
        $penerimas = Penerima::all();

        return view('admin.penyaluran.edit', compact(
            'penyaluran',
            'penerimas'
        ));
    }

    public function update(Request $request, Penyaluran $penyaluran)
    {
        $request->validate([
            'penerima_id'      => 'required',
            'tanggal'          => 'required',
            'jumlah_bantuan'   => 'required',
            'keterangan'       => 'required',
        ]);

        $penyaluran->update([
            'penerima_id'      => $request->penerima_id,
            'tanggal'          => $request->tanggal,
            'jumlah_bantuan'   => $request->jumlah_bantuan,
            'keterangan'       => $request->keterangan,
        ]);

        return redirect()->route('penyaluran.index')
            ->with('success', 'Penyaluran berhasil diupdate.');
    }

    public function destroy(Penyaluran $penyaluran)
    {
        $penyaluran->delete();

        return redirect()->route('penyaluran.index')
            ->with('success', 'Penyaluran berhasil dihapus.');
    }
}