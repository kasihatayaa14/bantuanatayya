<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'telepon',
        'jabatan_id',
        'pangkat_id',
        'status_id'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}