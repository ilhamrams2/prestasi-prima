<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaProyek extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_karya_proyeks';
    protected $fillable = ['judul', 'kategori', 'deskripsi', 'gambar', 'tags', 'link'];
}
