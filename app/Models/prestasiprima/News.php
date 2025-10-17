<?php

namespace App\Models\Prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * ===============================
     * Konfigurasi Model
     * ===============================
     */
    protected $table = 'prestasiprima_news';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'category_id',
        'author_id',
        'views',
    ];

    /**
     * ===============================
     * Relasi Model
     * ===============================
     */

    // 🔗 Relasi ke kategori berita
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // 👤 Relasi ke penulis berita (opsional)
    public function author()
    {
        return $this->belongsTo(\App\Models\User::class, 'author_id');
    }

    // 🏷️ Relasi ke tag berita (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'prestasiprima_news_tags', // nama pivot table
            'news_id',
            'tag_id'
        )->withTimestamps();
    }

    /**
     * ===============================
     * Accessor & Helper
     * ===============================
     */

    // 📅 Format tanggal agar mudah ditampilkan di Blade
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    // 🧠 Fungsi ringkasan otomatis
    public function getShortExcerptAttribute()
    {
        return $this->excerpt ?? \Str::limit(strip_tags($this->content), 120);
    }
}
