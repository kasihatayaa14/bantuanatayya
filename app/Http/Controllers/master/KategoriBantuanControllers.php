<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBantuan;

class KategoriBantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoribantuans = KategoriBantuan::latest()->get();

        return view(
            'admin.kategoribantuan.index',
            compact('kategoribantuans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategoribantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255',
            'keterangan'    => 'nullable'
        ]);

        KategoriBantuan::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan
        ]);

        return redirect()
            ->route('kategori-bantuan.index')
            ->with('success', 'Data kategori bantuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategoribantuan = KategoriBantuan::findOrFail($id);

        return view(
            'admin.kategoribantuan.show',
            compact('kategoribantuan')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoribantuan = KategoriBantuan::findOrFail($id);

        return view(
            'admin.kategoribantuan.edit',
            compact('kategoribantuan')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255',
            'keterangan'    => 'nullable'
        ]);

        $kategoribantuan = KategoriBantuan::findOrFail($id);

        $kategoribantuan->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan
        ]);

        return redirect()
            ->route('kategori-bantuan.index')
            ->with('success', 'Data kategori bantuan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategoribantuan = KategoriBantuan::findOrFail($id);

        $kategoribantuan->delete();

        return redirect()
            ->route('kategori-bantuan.index')
            ->with('success', 'Data kategori bantuan berhasil dihapus');
    }
}