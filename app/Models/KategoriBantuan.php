<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBantuan extends Model
{
    use HasFactory;

    protected $table = 'kategori_bantuan';
    protected $primaryKey = 'id_kategori_bantuan';

    protected $fillable = [
        'nama_kategori'
    ];
}