<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadStudent extends Model
{
    use HasFactory;
    
    protected $table = 'siakad_students';
    protected $guarded = ['id'];

    public function class()
    {
        return $this->belongsTo(SiakadClass::class, 'class_id');
    }

    public function enrollments()
    {
        return $this->hasMany(SiakadEnrollment::class, 'student_id');
    }

    public function major()
    {
        return $this->belongsTo(SiakadMajor::class, 'major_id');
    }
}
