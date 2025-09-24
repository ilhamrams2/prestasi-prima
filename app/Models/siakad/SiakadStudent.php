<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadStudent extends Model
{
    use HasFactory;
    
    protected $table = 'siakad_students';
    protected $fillable = [
        'student_id', 'name', 'gender', 'birth_date', 'class_id', 'year_entry'
    ];

    public function class()
    {
        return $this->belongsTo(SiakadClass::class, 'class_id');
    }

    public function enrollments()
    {
        return $this->hasMany(SiakadEnrollment::class, 'student_id');
    }
}
