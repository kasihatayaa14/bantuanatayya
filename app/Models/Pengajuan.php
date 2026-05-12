<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';

    protected $fillable = [
        'id_penerima',
        'id_jenis_bantuan',
        'id_status_pengajuan',
        'tanggal_pengajuan',
        'keterangan'
    ];

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima');
    }

    public function jenisBantuan()
    {
        return $this->belongsTo(JenisBantuan::class, 'id_jenis_bantuan');
    }

    public function statusPengajuan()
    {
        return $this->belongsTo(StatusPengajuan::class, 'id_status_pengajuan');
    }
}