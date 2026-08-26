<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_prestasis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Cache clearing on model changes.
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('prestasi_landing_list');
        });

        static::deleted(function () {
            Cache::forget('prestasi_landing_list');
        });
    }

    /**
     * Helper to get cached or fresh list for landing page.
     */
    public static function getForLanding()
    {
        return Cache::rememberForever('prestasi_landing_list', function () {
            return self::latest()->get();
        });
    }

    /**
     * Accessor for full image URL.
     */
    public function getGambarUrlAttribute(): string
    {
        if (empty($this->gambar)) {
            return asset('assets/images/section/prestasi/satu.webp');
        }

        if (str_starts_with($this->gambar, 'http://') || str_starts_with($this->gambar, 'https://')) {
            return $this->gambar;
        }

        if (str_starts_with($this->gambar, 'assets/')) {
            return asset($this->gambar);
        }

        if (str_starts_with($this->gambar, 'storage/')) {
            return asset($this->gambar);
        }

        // Check if file exists in public/storage
        if (file_exists(public_path('storage/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }

        // Fallback check in public/assets/images/section/prestasi
        $basename = basename($this->gambar);
        if (file_exists(public_path('assets/images/section/prestasi/' . $basename))) {
            return asset('assets/images/section/prestasi/' . $basename);
        }

        return asset('storage/' . ltrim($this->gambar, '/'));
    }
}
