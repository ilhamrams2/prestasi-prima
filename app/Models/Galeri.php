<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'category_id'];

    public function category(){ return $this->belongsTo(Category::class); }

    public function getEmbedUrlAttribute(): string
    {
        $url = $this->url;
        $id = null;

        if (preg_match('~youtu\.be/([^\?&/]+)~', $url, $m))         $id = $m[1];
        elseif (preg_match('~youtube\.com/(?:watch\?v=|live/|shorts/)([^\?&/]+)~', $url, $m)) 
            $id = $m[1];

        return $id ? "https://www.youtube.com/embed/{$id}" : $url;
    }
}
