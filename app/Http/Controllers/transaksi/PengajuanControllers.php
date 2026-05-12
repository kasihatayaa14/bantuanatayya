<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Penerima;
use App\Models\JenisBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with([
            'penerima',
            'jenisBantuan'
        ])->latest()->paginate(10);

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        $penerimas = Penerima::all();

        $jenisBantuans = JenisBantuan::all();

        return view('admin.pengajuan.create', compact(
            'penerimas',
            'jenisBantuans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id'          => 'required',
            'jenis_bantuan_id'    => 'required',
            'judul_pengajuan'     => 'required',
            'keterangan'          => 'required',
            'file_pengajuan'      => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $fileName = null;

        if ($request->hasFile('file_pengajuan')) {

            $file = $request->file('file_pengajuan');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/pengajuan'), $fileName);
        }

        Pengajuan::create([
            'penerima_id'          => $request->penerima_id,
            'jenis_bantuan_id'    => $request->jenis_bantuan_id,
            'judul_pengajuan'     => $request->judul_pengajuan,
            'keterangan'          => $request->keterangan,
            'status'              => 'pending',
            'file_pengajuan'      => $fileName,
        ]);

        return redirect()->route('pengajuan.index')
            ->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    public function show(Pengajuan $pengajuan)
    {
        return view('admin.pengajuan.show', compact('pengajuan'));
    }

    public function edit(Pengajuan $pengajuan)
    {
        $penerimas = Penerima::all();

        $jenisBantuans = JenisBantuan::all();

        return view('admin.pengajuan.edit', compact(
            'pengajuan',
            'penerimas',
            'jenisBantuans'
        ));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'penerima_id'          => 'required',
            'jenis_bantuan_id'    => 'required',
            'judul_pengajuan'     => 'required',
            'keterangan'          => 'required',
        ]);

        $data = [
            'penerima_id'          => $request->penerima_id,
            'jenis_bantuan_id'    => $request->jenis_bantuan_id,
            'judul_pengajuan'     => $request->judul_pengajuan,
            'keterangan'          => $request->keterangan,
        ];

        if ($request->hasFile('file_pengajuan')) {

            if ($pengajuan->file_pengajuan) {

                $oldPath = public_path('uploads/pengajuan/' . $pengajuan->file_pengajuan);

                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $file = $request->file('file_pengajuan');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('uploads/pengajuan'), $fileName);

            $data['file_pengajuan'] = $fileName;
        }

        $pengajuan->update($data);

        return redirect()->route('pengajuan.index')
            ->with('success', 'Pengajuan berhasil diupdate.');
    }

    public function destroy(Pengajuan $pengajuan)
    {
        if ($pengajuan->file_pengajuan) {

            $path = public_path('uploads/pengajuan/' . $pengajuan->file_pengajuan);

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $pengajuan->delete();

        return redirect()->route('pengajuan.index')
            ->with('success', 'Pengajuan berhasil dihapus.');
    }
}