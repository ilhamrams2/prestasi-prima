<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_kegiatan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'jam',
        'tempat',
    ];
}
