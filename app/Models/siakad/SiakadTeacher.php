<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadTeacher extends Model
{
    use HasFactory;
    
    protected $table = 'siakad_teachers';
    protected $fillable = [
        'teacher_id', 'name', 'subject', 'position', 'email', 'phone'
    ];

    public function enrollments()
    {
        return $this->hasMany(SiakadEnrollment::class, 'teacher_id');
    }

    public function user()
    {
        return $this->hasOne(SiakadUsers::class, 'teacher_id');
    }
}
