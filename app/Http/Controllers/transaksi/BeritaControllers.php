<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $beritas = Berita::latest()->paginate(10);

        return view('admin.berita.index', compact('beritas'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.berita.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|max:255',
            'isi'          => 'required',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'       => 'required',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $gambarName = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');

            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            $gambar->move(public_path('uploads/berita'), $gambarName);
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN BERITA
        |--------------------------------------------------------------------------
        */

        Berita::create([
            'judul'            => $request->judul,
            'slug'             => Str::slug($request->judul),
            'isi'              => $request->isi,
            'gambar'           => $gambarName,
            'status'           => $request->status,
            'user_id'          => Auth::id(),
            'tanggal_publish'  => now(),
        ]);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'isi'      => 'required',
            'status'   => 'required',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA UPDATE
        |--------------------------------------------------------------------------
        */

        $data = [
            'judul'    => $request->judul,
            'slug'     => Str::slug($request->judul),
            'isi'      => $request->isi,
            'status'   => $request->status,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPDATE GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            /*
            |--------------------------------------------------------------------------
            | DELETE GAMBAR LAMA
            |--------------------------------------------------------------------------
            */

            if ($berita->gambar) {

                $oldPath = public_path('uploads/berita/' . $berita->gambar);

                if (File::exists($oldPath)) {

                    File::delete($oldPath);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD GAMBAR BARU
            |--------------------------------------------------------------------------
            */

            $gambar = $request->file('gambar');

            $gambarName = time() . '_' . $gambar->getClientOriginalName();

            $gambar->move(public_path('uploads/berita'), $gambarName);

            $data['gambar'] = $gambarName;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $berita->update($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Berita $berita)
    {
        /*
        |--------------------------------------------------------------------------
        | DELETE GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($berita->gambar) {

            $path = public_path('uploads/berita/' . $berita->gambar);

            if (File::exists($path)) {

                File::delete($path);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DELETE DATA
        |--------------------------------------------------------------------------
        */

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | PUBLISH BERITA
    |--------------------------------------------------------------------------
    */

    public function publish(Berita $berita)
    {
        $berita->update([
            'status' => 'publish',
            'tanggal_publish' => now(),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Berita berhasil dipublish.');
    }

    /*
    |--------------------------------------------------------------------------
    | DRAFT BERITA
    |--------------------------------------------------------------------------
    */

    public function draft(Berita $berita)
    {
        $berita->update([
            'status' => 'draft',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Berita berhasil dijadikan draft.');
    }
}