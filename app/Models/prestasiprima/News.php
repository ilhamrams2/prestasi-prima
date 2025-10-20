<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\prestasiprima\Category;

class News extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_news';
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'thumbnail', 'category_id', 'author_id', 'views',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi ke penulis
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }
}

