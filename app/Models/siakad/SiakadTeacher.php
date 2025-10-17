<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadTeacher extends Model
{
    use HasFactory;

    protected $table = 'siakad_teachers';

    protected $fillable = [
        'teacher_id',
        'name',
        'subject',
        'position',
        'email',
        'phone',
        'status',
    ];

    public function enrollments()
    {
        return $this->hasMany(SiakadEnrollment::class, 'teacher_id');
    }

    public function user()
    {
        return $this->hasOne(SiakadUser::class, 'teacher_id');
    }

    /**
     * Helper: ambil subject sebagai array
     */
    public function getSubjectsArrayAttribute()
    {
        return $this->subject ? array_map('trim', explode(',', $this->subject)) : [];
    }

    public function classes()
    {
        return $this->hasMany(SiakadClass::class, 'teacher_id');
    }
}
