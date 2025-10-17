<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadClass extends Model
{
    use HasFactory;

    protected $table = 'siakad_classes';
    protected $guarded = ['id'];

    public function students()
    {
        return $this->hasMany(SiakadStudent::class, 'class_id');
    }

    public function major()
    {
        return $this->belongsTo(SiakadMajor::class, 'major_id');
    }

    public function teacher()
    {
        return $this->belongsTo(SiakadTeacher::class, 'teacher_id');
    }


    protected static function booted()
    {
        static::creating(function ($class) {
            // Pastikan relasi 'major' sudah terdefinisi di model SiakadClass
            $majorCode = $class->major->major_code ?? '';
            $majorName = $class->major->name ?? '';

            // Bentuk nama kelas (misalnya: 10 PPLG 1)
            $class->name = trim("{$class->grade} {$majorName} {$class->group_number}");

            // Bentuk kode kelas (misalnya: 10PPLG1 atau 10PPLG-1)
            $class->class_code = strtoupper("{$class->grade}{$majorCode}{$class->group_number}");
        });
    }
}
