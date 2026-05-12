<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    use HasFactory;

    protected $table = 'jenis_bantuan';
    protected $primaryKey = 'id_jenis_bantuan';

    protected $fillable = [
        'id_kategori_bantuan',
        'nama_bantuan'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBantuan::class, 'id_kategori_bantuan');
    }
}