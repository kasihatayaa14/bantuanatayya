<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Penyaluran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BuktiPenyaluranController extends Controller
{
    public function upload(Request $request, Penyaluran $penyaluran)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($penyaluran->bukti) {

            $oldPath = public_path('uploads/penyaluran/' . $penyaluran->bukti);

            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
        }

        $file = $request->file('bukti');

        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path('uploads/penyaluran'), $fileName);

        $penyaluran->update([
            'bukti' => $fileName,
        ]);

        return redirect()->back()
            ->with('success', 'Bukti penyaluran berhasil diupload.');
    }
}