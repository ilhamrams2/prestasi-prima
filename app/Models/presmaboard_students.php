<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class presmaboard_students extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'foto',
        'kelas',
        'jurusan',
        'angkatan',
        'email',
        'no_induk',
        'is_active',
    ];


    public function scores()
    {
        return $this->hasMany(presmaboard_scores::class, 'student_id');
    }

    public function projects()
    {
        return $this->hasMany(presmaboard_projects::class, 'student_id');
    }

    public function achievements()
    {
        return $this->hasMany(presmaboard_achievements::class, 'student_id');
    }

    public function leaderboards()
    {
        return $this->hasMany(presmaboard_leaderboards::class, 'student_id');
    }

    public function currentLeaderboard()
    {
        return $this->hasOne(presmaboard_leaderboards::class, 'student_id')
                    ->latestOfMany(); // leaderboard terbaru
    }

    public function latestScore()
    {
        return $this->hasOne(presmaboard_scores::class, 'student_id')
                    ->latestOfMany();
    }
}
