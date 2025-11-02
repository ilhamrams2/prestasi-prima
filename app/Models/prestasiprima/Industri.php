<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    // Nama tabel baru
    protected $table = 'prestasiprima_industris';

    protected $fillable = [
        'nama',
        'slug',
        'logo',
    ];
}
