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
        'address',
        'bio',
        'skills',
        'education',
        'experience',
        'portfolio_link',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get skills as array
     */
    public function getSkillsArrayAttribute(): array
    {
        return array_filter(array_map('trim', preg_split('/[,\n]+/', $this->skills ?? '')));
    }
}
