<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadEnrollment extends Model
{
    use HasFactory;
    protected $table = 'siakad_enrollments';
    protected $fillable = ['student_id', 'subject_id', 'teacher_id', 'semester'];

    public function student()
    {
        return $this->belongsTo(SiakadStudent::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(SiakadSubject::class, 'subject_id');
    }

    public function teacher()
    {
        return $this->belongsTo(SiakadTeacher::class, 'teacher_id');
    }

    public function scores()
    {
        return $this->hasMany(SiakadScore::class, 'enrollment_id');
    }

    public function attendance()
    {
        return $this->hasMany(SiakadAttendance::class, 'enrollment_id');
    }
}
