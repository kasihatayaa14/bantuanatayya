<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::latest()->paginate(10);

        return view('admin.status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_status' => 'required',
        ]);

        Status::create([
            'nama_status' => $request->nama_status,
        ]);

        return redirect()->route('status.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Status $status)
    {
        return view('admin.status.show', compact('status'));
    }

    public function edit(Status $status)
    {
        return view('admin.status.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $request->validate([
            'nama_status' => 'required',
        ]);

        $status->update([
            'nama_status' => $request->nama_status,
        ]);

        return redirect()->route('status.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Status $status)
    {
        $status->delete();

        return redirect()->route('status.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}