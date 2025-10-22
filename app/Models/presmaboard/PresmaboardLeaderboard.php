<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaboardLeaderboard extends Model
{
     use HasFactory;

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

    public function student()
    {
        return $this->belongsTo(PresmaboardStudent::class, 'student_id');
    }
}
