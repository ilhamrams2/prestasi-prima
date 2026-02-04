<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\prestasiprima\Category;
use App\Models\prestasiprima\PPuser;

class News extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_news';
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'thumbnail', 'category_id', 'status', 'author_id', 'views',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relasi ke penulis
    public function author()
    {
        return $this->belongsTo(PPuser::class, 'author_id');
    }
}

