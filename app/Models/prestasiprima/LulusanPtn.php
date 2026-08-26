<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class LulusanPtn extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_lulusan_ptns';

    protected $fillable = [
        'nama_kampus',
        'singkatan',
        'logo',
        'link_website',
        'urutan',
        'is_active',
        'deskripsi',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'urutan' => 'integer',
    ];

    /**
     * Cache invalidation on model lifecycle events.
     */
    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('lulusan_ptn_active_list');
        });

        static::deleted(function () {
            Cache::forget('lulusan_ptn_active_list');
        });
    }

    /**
     * Get active PTN list for landing page.
     */
    public static function getActive()
    {
        return Cache::rememberForever('lulusan_ptn_active_list', function () {
            // If table is completely empty, seed default items
            if (self::count() === 0) {
                self::seedDefaults();
            }

            return self::where('is_active', true)
                ->orderBy('urutan', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        });
    }

    /**
     * Seed initial default PTN records.
     */
    public static function seedDefaults()
    {
        $defaults = [
            ['nama_kampus' => 'Universitas Negeri Jakarta', 'singkatan' => 'UNJ', 'logo' => 'assets/images/section/ptn/unj.png', 'urutan' => 1],
            ['nama_kampus' => 'Institut Pertanian Bogor', 'singkatan' => 'IPB', 'logo' => 'assets/images/section/ptn/ipb.png', 'urutan' => 2],
            ['nama_kampus' => 'Universitas Padjadjaran', 'singkatan' => 'UNPAD', 'logo' => 'assets/images/section/ptn/unpad.png', 'urutan' => 3],
            ['nama_kampus' => 'Universitas Trisakti', 'singkatan' => 'TRISAKTI', 'logo' => 'assets/images/section/ptn/trisakti.png', 'urutan' => 4],
            ['nama_kampus' => 'UIN Syarif Hidayatullah Jakarta', 'singkatan' => 'UIN', 'logo' => 'assets/images/section/ptn/uin2.png', 'urutan' => 5],
            ['nama_kampus' => 'Institut Seni Indonesia Surakarta', 'singkatan' => 'ISI', 'logo' => 'assets/images/section/ptn/isi2.png', 'urutan' => 6],
            ['nama_kampus' => 'Politeknik Prestasi Prima', 'singkatan' => 'POLITEKNIK', 'logo' => 'assets/images/section/ptn/politeknik.png', 'urutan' => 7],
            ['nama_kampus' => 'Universitas Indonesia', 'singkatan' => 'UI', 'logo' => 'assets/images/section/ptn/ui3.png', 'urutan' => 8],
        ];

        foreach ($defaults as $item) {
            self::create(array_merge($item, ['is_active' => true]));
        }
    }

    /**
     * Accessor for full logo URL.
     */
    public function getLogoUrlAttribute(): string
    {
        if (empty($this->logo)) {
            return asset('assets/images/section/ptn/unj.png');
        }

        if (str_starts_with($this->logo, 'http://') || str_starts_with($this->logo, 'https://')) {
            return $this->logo;
        }

        if (str_starts_with($this->logo, 'assets/')) {
            return asset($this->logo);
        }

        if (str_starts_with($this->logo, 'storage/')) {
            return asset($this->logo);
        }

        if (file_exists(public_path('storage/' . $this->logo))) {
            return asset('storage/' . $this->logo);
        }

        $basename = basename($this->logo);
        if (file_exists(public_path('assets/images/section/ptn/' . $basename))) {
            return asset('assets/images/section/ptn/' . $basename);
        }

        return asset('storage/' . ltrim($this->logo, '/'));
    }
}
