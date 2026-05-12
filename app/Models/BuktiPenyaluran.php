<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPenyaluran extends Model
{
    use HasFactory;

    protected $table = 'bukti_penyaluran';
    protected $primaryKey = 'id_bukti_penyaluran';

    protected $fillable = [
        'id_penyaluran',
        'foto_bukti'
    ];

    public function penyaluran()
    {
        return $this->belongsTo(Penyaluran::class, 'id_penyaluran');
    }
}