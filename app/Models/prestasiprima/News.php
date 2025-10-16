<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_news';
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'thumbnail', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}