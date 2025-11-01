<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_prestasis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
    ];
}
