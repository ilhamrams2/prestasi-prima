<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_leaderboard extends Model
{
    use HasFactory;


    protected $table = 'presmaboard_leaderboards';

    protected $fillable = [
        'student_id',
        'total_score',
        'rank',
        'periode',
        'last_calculated_at',
    ];

    protected $casts = [
        'total_score' => 'decimal:2',
        'last_calculated_at' => 'datetime',
    ];

    /** -------------------------
     *  RELASI ANTAR MODEL
     *  ------------------------*/

    // Setiap leaderboard milik satu student
    public function student()
    {
        return $this->belongsTo(presmaboard_student::class, 'student_id');
    }


}
