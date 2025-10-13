<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_achievements extends Model
{
    use HasFactory;

     protected $fillable = [
        'student_id',
        'judul_prestasi',
        'deskripsi',
        'tanggal',
    ];

    public function student()
    {
        return $this->belongsTo(presmaboard_student::class, 'student_id');
    }



}