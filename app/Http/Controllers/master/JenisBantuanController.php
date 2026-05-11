<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBantuan;
use App\Models\KategoriBantuan;

class JenisBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisbantuans = JenisBantuan::with('kategoriBantuan')
                            ->latest()
                            ->get();

        return view(
            'admin.jenisbantuan.index',
            compact('jenisbantuans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriBantuan::all();

        return view(
            'admin.jenisbantuan.create',
            compact('kategoris')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_bantuan_id' => 'required',
            'nama_jenis'          => 'required|max:255',
            'nominal'             => 'required|numeric',
            'keterangan'          => 'nullable'
        ]);

        JenisBantuan::create([
            'kategori_bantuan_id' => $request->kategori_bantuan_id,
            'nama_jenis'          => $request->nama_jenis,
            'nominal'             => $request->nominal,
            'keterangan'          => $request->keterangan
        ]);

        return redirect()
            ->route('jenis-bantuan.index')
            ->with('success', 'Data jenis bantuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jenisbantuan = JenisBantuan::with('kategoriBantuan')
                            ->findOrFail($id);

        return view(
            'admin.jenisbantuan.show',
            compact('jenisbantuan')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisbantuan = JenisBantuan::findOrFail($id);

        $kategoris = KategoriBantuan::all();

        return view(
            'admin.jenisbantuan.edit',
            compact(
                'jenisbantuan',
                'kategoris'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_bantuan_id' => 'required',
            'nama_jenis'          => 'required|max:255',
            'nominal'             => 'required|numeric',
            'keterangan'          => 'nullable'
        ]);

        $jenisbantuan = JenisBantuan::findOrFail($id);

        $jenisbantuan->update([
            'kategori_bantuan_id' => $request->kategori_bantuan_id,
            'nama_jenis'          => $request->nama_jenis,
            'nominal'             => $request->nominal,
            'keterangan'          => $request->keterangan
        ]);

        return redirect()
            ->route('jenis-bantuan.index')
            ->with('success', 'Data jenis bantuan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisbantuan = JenisBantuan::findOrFail($id);

        $jenisbantuan->delete();

        return redirect()
            ->route('jenis-bantuan.index')
            ->with('success', 'Data jenis bantuan berhasil dihapus');
    }
}