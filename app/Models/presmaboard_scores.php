<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class presmaboard_scores extends Model
{
    use HasFactory;

    protected $table = 'presmaboard_scores';

    protected $fillable = [
        'student_id',
        'nilai_pkp',
        'semester',
        'tahun_ajaran',
        'tipe_ujian',
    ];

    protected $casts = [
        'nilai_pkp' => 'decimal:2',
    ];

    /**
     * Relasi ke student
     */
    public function student()
    {
        return $this->belongsTo(presmaboard_students::class, 'student_id');
    }

    /**
     * Mencegah duplikasi nilai saat insert
     */
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

    /**
     * Scope untuk filter periode tertentu
     */
    public function scopePeriode($query, $semester, $tahun)
    {
        return $query->where('semester', $semester)
                     ->where('tahun_ajaran', $tahun);
    }

    /**
     * Scope untuk UTS
     */
    public function scopeUTS($query)
    {
        return $query->where('tipe_ujian', 'UTS');
    }

    /**
     * Scope untuk UAS
     */
    public function scopeUAS($query)
    {
        return $query->where('tipe_ujian', 'UAS');
    }

    /**
     * Scope untuk menghitung rata-rata nilai PKP berdasarkan student
     */
    public function scopeAverageByStudent($query, $studentId)
    {
        return $query->where('student_id', $studentId)->avg('nilai_pkp');
    }
}
