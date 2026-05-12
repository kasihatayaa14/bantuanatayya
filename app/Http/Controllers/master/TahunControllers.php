<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function index()
    {
        $tahuns = Tahun::latest()->paginate(10);

        return view('admin.tahun.index', compact('tahuns'));
    }

    public function create()
    {
        return view('admin.tahun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        Tahun::create([
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('tahun.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Tahun $tahun)
    {
        return view('admin.tahun.show', compact('tahun'));
    }

    public function edit(Tahun $tahun)
    {
        return view('admin.tahun.edit', compact('tahun'));
    }

    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        $tahun->update([
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('tahun.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect()->route('tahun.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}