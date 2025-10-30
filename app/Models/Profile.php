<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'presmalancer_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'location',
        'address',
        'bio',
        'skills',
        'education',
        'experience',
        'portfolio_link',
        'avatar',
        'role',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return avatar URL (storage or fallback to user's avatar or ui-avatars)
     */
    public function getAvatarUrlAttribute(): string
    {
        if ($this->avatar) {
            return \Illuminate\Support\Facades\Storage::url($this->avatar);
        }

        if ($this->user && $this->user->avatar) {
            return $this->user->avatar;
        }

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->user->name ?? 'User') . '&background=f97316&color=fff&size=200';
    }

    /**
     * Get skills as array
     */
    public function getSkillsArrayAttribute(): array
    {
        return array_filter(array_map('trim', preg_split('/[,\n]+/', $this->skills ?? '')));
    }
}
