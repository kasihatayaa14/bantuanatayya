<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusPengajuan;

class StatusPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuspengajuans = StatusPengajuan::latest()->get();

        return view(
            'admin.statuspengajuan.index',
            compact('statuspengajuans')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statuspengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_status' => 'required|max:255',
            'keterangan'  => 'nullable'
        ]);

        StatusPengajuan::create([
            'nama_status' => $request->nama_status,
            'keterangan'  => $request->keterangan
        ]);

        return redirect()
            ->route('status-pengajuan.index')
            ->with('success', 'Status pengajuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $statuspengajuan = StatusPengajuan::findOrFail($id);

        return view(
            'admin.statuspengajuan.show',
            compact('statuspengajuan')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $statuspengajuan = StatusPengajuan::findOrFail($id);

        return view(
            'admin.statuspengajuan.edit',
            compact('statuspengajuan')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_status' => 'required|max:255',
            'keterangan'  => 'nullable'
        ]);

        $statuspengajuan = StatusPengajuan::findOrFail($id);

        $statuspengajuan->update([
            'nama_status' => $request->nama_status,
            'keterangan'  => $request->keterangan
        ]);

        return redirect()
            ->route('status-pengajuan.index')
            ->with('success', 'Status pengajuan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statuspengajuan = StatusPengajuan::findOrFail($id);

        $statuspengajuan->delete();

        return redirect()
            ->route('status-pengajuan.index')
            ->with('success', 'Status pengajuan berhasil dihapus');
    }
}