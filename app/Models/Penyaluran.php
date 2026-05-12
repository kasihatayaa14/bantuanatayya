<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $table = 'penyaluran';
    protected $primaryKey = 'id_penyaluran';

    protected $fillable = [
        'id_pengajuan',
        'tanggal_penyaluran',
        'jumlah_bantuan',
        'keterangan'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
}