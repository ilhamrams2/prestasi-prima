<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_projects extends Model
{
    use HasFactory;

     protected $fillable = [
        'student_id',
        'judul_project',
        'deskripsi',
        'gambar',
        'kategori',
    ];

    public function student()
    {
        return $this->belongsTo(presmaboard_students::class, 'student_id');
    }

}