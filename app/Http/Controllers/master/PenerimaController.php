<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Penerima;
use App\Models\Status;
use App\Models\Jabatan;
use App\Models\Pangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class PenerimaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $penerimas = Penerima::latest()->paginate(10);

        return view('admin.penerima.index', compact('penerimas'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $statuses = Status::all();

        $jabatans = Jabatan::all();

        $pangkats = Pangkat::all();

        return view('admin.penerima.create', compact(
            'statuses',
            'jabatans',
            'pangkats'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'nik'               => 'required|unique:penerimas,nik',
            'nama'              => 'required',
            'email'             => 'required|email|unique:penerimas,email',
            'no_hp'             => 'required',
            'alamat'            => 'required',
            'status_id'         => 'required',
            'jabatan_id'        => 'required',
            'pangkat_id'        => 'required',
            'password'          => 'required|min:6',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD FOTO
        |--------------------------------------------------------------------------
        */

        $fotoName = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');

            $fotoName = time() . '_' . $foto->getClientOriginalName();

            $foto->move(public_path('uploads/penerima'), $fotoName);
        }

        /*
        |--------------------------------------------------------------------------
        | SAVE DATA
        |--------------------------------------------------------------------------
        */

        Penerima::create([
            'nik'               => $request->nik,
            'nama'              => $request->nama,
            'email'             => $request->email,
            'no_hp'             => $request->no_hp,
            'alamat'            => $request->alamat,
            'status_id'         => $request->status_id,
            'jabatan_id'        => $request->jabatan_id,
            'pangkat_id'        => $request->pangkat_id,
            'password'          => Hash::make($request->password),
            'foto'              => $fotoName,
        ]);

        return redirect()
            ->route('penerima.index')
            ->with('success', 'Data penerima berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show(Penerima $penerima)
    {
        return view('admin.penerima.show', compact('penerima'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Penerima $penerima)
    {
        $statuses = Status::all();

        $jabatans = Jabatan::all();

        $pangkats = Pangkat::all();

        return view('admin.penerima.edit', compact(
            'penerima',
            'statuses',
            'jabatans',
            'pangkats'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Penerima $penerima)
    {
        $request->validate([
            'nik'               => 'required|unique:penerimas,nik,' . $penerima->id,
            'nama'              => 'required',
            'email'             => 'required|email|unique:penerimas,email,' . $penerima->id,
            'no_hp'             => 'required',
            'alamat'            => 'required',
            'status_id'         => 'required',
            'jabatan_id'        => 'required',
            'pangkat_id'        => 'required',
            'foto'              => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA UPDATE
        |--------------------------------------------------------------------------
        */

        $data = [
            'nik'               => $request->nik,
            'nama'              => $request->nama,
            'email'             => $request->email,
            'no_hp'             => $request->no_hp,
            'alamat'            => $request->alamat,
            'status_id'         => $request->status_id,
            'jabatan_id'        => $request->jabatan_id,
            'pangkat_id'        => $request->pangkat_id,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        if ($request->password) {

            $data['password'] = Hash::make($request->password);
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE FOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto')) {

            /*
            |--------------------------------------------------------------------------
            | DELETE FOTO LAMA
            |--------------------------------------------------------------------------
            */

            if ($penerima->foto) {

                $oldPath = public_path('uploads/penerima/' . $penerima->foto);

                if (File::exists($oldPath)) {

                    File::delete($oldPath);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | UPLOAD FOTO BARU
            |--------------------------------------------------------------------------
            */

            $foto = $request->file('foto');

            $fotoName = time() . '_' . $foto->getClientOriginalName();

            $foto->move(public_path('uploads/penerima'), $fotoName);

            $data['foto'] = $fotoName;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $penerima->update($data);

        return redirect()
            ->route('penerima.index')
            ->with('success', 'Data penerima berhasil diupdate.');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Penerima $penerima)
    {
        /*
        |--------------------------------------------------------------------------
        | DELETE FOTO
        |--------------------------------------------------------------------------
        */

        if ($penerima->foto) {

            $path = public_path('uploads/penerima/' . $penerima->foto);

            if (File::exists($path)) {

                File::delete($path);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | DELETE DATA
        |--------------------------------------------------------------------------
        */

        $penerima->delete();

        return redirect()
            ->route('penerima.index')
            ->with('success', 'Data penerima berhasil dihapus.');
    }
}