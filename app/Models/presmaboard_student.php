<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_student extends Model
{
    use HasFactory;


      protected $fillable = [
        'nama',
        'gender',
        'foto',
        'kelas',
        'jurusan',
        'angkatan',
        'email',
        'nis',
        'is_active',
    ];


    public function scores()
    {
        return $this->hasMany(presmaboard_score::class, 'student_id');
    }

    public function projects()
    {
        return $this->hasMany(presmaboard_project::class, 'student_id');
    }

    public function achievements()
    {
        return $this->hasMany(presmaboard_achievements::class, 'student_id');
    }

    public function leaderboards()
    {
        return $this->hasMany(presmaboard_leaderboard::class, 'student_id');
    }

    public function currentLeaderboard()
    {
        return $this->hasOne(presmaboard_leaderboard::class, 'student_id')
                    ->latestOfMany(); // leaderboard terbaru
    }

    public function latestScore()
    {
        return $this->hasOne(presmaboard_score::class, 'student_id')
                    ->latestOfMany();
    }



}
