<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Nama tabel (opsional, bisa dihapus kalau default sudah benar)
    protected $table = 'beritas';

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'judul',
        'kategori',
        'tanggal_upload',
        'isi',
        'gambar',
        'penulis',
    ];

    // Casting agar tanggal_upload otomatis jadi instance Carbon
    protected $casts = [
        'tanggal_upload' => 'date',
    ];
}
