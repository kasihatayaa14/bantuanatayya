<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        return view('transaksi.komentar.index');
    }

    public function create()
    {
        return view('transaksi.komentar.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil ditambahkan');
    }

    public function show($id)
    {
        return view('transaksi.komentar.show', compact('id'));
    }

    public function edit($id)
    {
        return view('transaksi.komentar.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil diupdate');
    }

    public function destroy($id)
    {
        return redirect()->route('komentar.index')
            ->with('success', 'Komentar berhasil dihapus');
    }
}