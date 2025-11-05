<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaboardStudent extends Model
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
        return $this->hasMany(PresmaboardScore::class, 'student_id');
    }

    public function projects()
    {
        return $this->hasMany(PresmaboardProject::class, 'student_id');
    }

    public function achievements()
    {
        return $this->hasMany(PresmaboardAchievement::class, 'student_id');
    }

    public function leaderboards()
    {
        return $this->hasMany(PresmaboardLeaderboard::class, 'student_id');
    }

    public function currentLeaderboard()
    {
        return $this->hasOne(PresmaboardLeaderboard::class, 'student_id')
            ->latestOfMany(); 
    }

    public function latestScore()
    {
        return $this->hasOne(PresmaboardScore::class, 'student_id')
            ->latestOfMany();
    }
}
