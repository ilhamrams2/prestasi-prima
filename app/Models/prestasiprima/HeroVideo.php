<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class HeroVideo extends Model
{
    use HasFactory;

    protected $table = 'hero_videos';

    protected $fillable = [
        'title',
        'video_url',
        'video_id',
        'tagline',
        'headline_top',
        'headline_bottom',
        'description',
        'hud_tag',
        'hud_status',
        'hud_mission',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Cache invalidation and auto-parsing on model events.
     */
    protected static function booted()
    {
        static::saving(function ($model) {
            if (!empty($model->video_url)) {
                $model->video_id = self::parseYoutubeId($model->video_url);
            }
        });

        static::saved(function () {
            Cache::forget('hero_video_active');
        });

        static::deleted(function () {
            Cache::forget('hero_video_active');
        });
    }

    /**
     * Get the active Hero Video record.
     */
    public static function getActive()
    {
        return Cache::rememberForever('hero_video_active', function () {
            $active = self::where('is_active', true)->latest()->first();

            if (!$active) {
                $active = self::latest()->first();
            }

            if (!$active) {
                $active = self::seedDefault();
            }

            return $active;
        });
    }

    /**
     * Seed initial default Hero Video.
     */
    public static function seedDefault()
    {
        return self::create([
            'title' => 'Video Profil Utama SMK Prestasi Prima',
            'video_url' => 'https://www.youtube.com/watch?v=EYzn0caf0_k',
            'video_id' => 'EYzn0caf0_k',
            'tagline' => '"If better is possible, good is not enough"',
            'headline_top' => 'PRESTASI',
            'headline_bottom' => 'PRIMA',
            'description' => 'Mencetak generasi unggul yang tidak hanya kompeten secara teknis, namun juga memiliki integritas karakter untuk memimpin masa depan industri global.',
            'hud_tag' => 'Institutional Vision / 2025',
            'hud_status' => 'Status: Active',
            'hud_mission' => 'Mission / 01',
            'is_active' => true,
        ]);
    }

    /**
     * Extract YouTube ID from any format of YouTube URL, short link, embed, shorts, live, or raw ID.
     */
    public static function parseYoutubeId(?string $url): string
    {
        if (empty($url)) {
            return 'EYzn0caf0_k';
        }

        $url = trim($url);

        // 1. Exact 11-char alphanumeric YouTube Video ID
        if (preg_match('/^[a-zA-Z0-9_\-]{11}$/', $url)) {
            return $url;
        }

        // 2. Query param ?v=XXXXXXXXXXX or &v=XXXXXXXXXXX
        if (preg_match('/[?&]v=([a-zA-Z0-9_\-]{11})/i', $url, $matches)) {
            return $matches[1];
        }

        // 3. URLs with embed, shorts, live, youtu.be, or custom youtube domain
        if (preg_match('/(?:youtu\.be\/|youtube(?:-nocookie)?\.(?:com|be|sch\.id)\/(?:embed\/|shorts\/|live\/|v\/|watch\?v=|e\/)|youtube\/)([a-zA-Z0-9_\-]{11})/i', $url, $matches)) {
            return $matches[1];
        }

        // 4. Any 11-character token preceded by a slash or equals
        if (preg_match('/[\/=]([a-zA-Z0-9_\-]{11})(?:[?&#\s]|$)/i', $url, $matches)) {
            return $matches[1];
        }

        // 5. Fallback: match any 11 valid characters
        if (preg_match('/([a-zA-Z0-9_\-]{11})/', $url, $matches)) {
            return $matches[1];
        }

        return 'EYzn0caf0_k';
    }

    /**
     * Extract start time (seconds) from YouTube URL if present.
     */
    public static function parseStartTime(?string $url): int
    {
        if (empty($url)) return 0;
        
        // Match ?t=90 or &t=90s or start=90
        if (preg_match('/[?&](?:t|start)=(\d+)/i', $url, $m)) {
            return (int) $m[1];
        }

        // Match ?t=1m30s
        if (preg_match('/[?&]t=(?:(\d+)m)?(?:(\d+)s)?/i', $url, $m)) {
            $mins = isset($m[1]) && $m[1] !== '' ? (int) $m[1] : 0;
            $secs = isset($m[2]) && $m[2] !== '' ? (int) $m[2] : 0;
            return ($mins * 60) + $secs;
        }

        return 0;
    }

    /**
     * Dynamic Start Time Attribute Accessor.
     */
    public function getStartTimeAttribute(): int
    {
        return self::parseStartTime($this->video_url);
    }

    /**
     * Dynamic YouTube Thumbnail URL.
     */
    public function getThumbnailUrlAttribute(): string
    {
        $id = $this->video_id ?: self::parseYoutubeId($this->video_url);
        return "https://img.youtube.com/vi/{$id}/maxresdefault.jpg";
    }

    /**
     * Dynamic Full YouTube Embed URL with optimized player parameters.
     */
    public function getEmbedUrlAttribute(): string
    {
        $id = $this->video_id ?: self::parseYoutubeId($this->video_url);
        $start = $this->start_time;

        $params = [
            'autoplay' => 1,
            'mute' => 1,
            'controls' => 0,
            'loop' => 1,
            'playlist' => $id,
            'playsinline' => 1,
            'rel' => 0,
            'showinfo' => 0,
            'iv_load_policy' => 3,
            'cc_load_policy' => 0,
            'cc_lang_pref' => 'none',
            'modestbranding' => 1,
            'disablekb' => 1,
            'fs' => 0,
            'enablejsapi' => 1,
        ];

        if ($start > 0) {
            $params['start'] = $start;
        }

        return 'https://www.youtube.com/embed/' . $id . '?' . http_build_query($params);
    }
}
