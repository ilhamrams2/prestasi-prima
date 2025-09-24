<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadScore extends Model
{
    use HasFactory;
    protected $table = 'siakad_scores';
    protected $fillable = [
        'enrollment_id',
        'assignment',
        'mid_exam',
        'final_exam',
        'final_score',
        'grade'
    ];

    public function enrollment()
    {
        return $this->belongsTo(SiakadEnrollment::class, 'enrollment_id');
    }
}
