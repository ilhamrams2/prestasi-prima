<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class PresmaboardScore extends Model
{
      use HasFactory;


    protected $table = 'presmaboard_scores';

    protected $fillable = [
        'student_id',
        'score',
        'semester',
        'tahun_ajaran',
        'tipe_ujian',
    ];

    protected $casts = [
        'score' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(PresmaboardStudent::class, 'student_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($score) {
            $exists = self::where('student_id', $score->student_id)
                ->where('semester', $score->semester)
                ->where('tahun_ajaran', $score->tahun_ajaran)
                ->where('tipe_ujian', $score->tipe_ujian)
                ->exists();

            if ($exists) {
                throw new Exception('Nilai PKP untuk UTS/UAS pada semester dan tahun ajaran ini sudah ada.');
            }
        });
    }


    public function scopePeriode($query, $semester, $tahun)
    {
        return $query->where('semester', $semester)
            ->where('tahun_ajaran', $tahun);
    }


    public function scopeUTS($query)
    {
        return $query->where('tipe_ujian', 'UTS');
    }


    public function scopeUAS($query)
    {
        return $query->where('tipe_ujian', 'UAS');
    }


    public function scopeAverageByStudent($query, $studentId)
    {
        return $query->where('student_id', $studentId)->avg('score');
    }
}
