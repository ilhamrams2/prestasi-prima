<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon'];

    // Relasi ke Galeri (1 kategori punya banyak galeri)
    public function galeris()
    {
        return $this->hasMany(Galeri::class, 'category_id');
    }
}
