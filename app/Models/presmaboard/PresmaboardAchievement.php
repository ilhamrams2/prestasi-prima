<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaboardAchievement extends Model
{
      use HasFactory;

    protected $fillable = [
        'student_id',
        'judul',
        'deskripsi',
        'tanggal',
    ];
    protected $cast = [
        'tanggal' => 'datetime'
    ];

    public function student()
    {
        return $this->belongsTo(PresmaboardStudent::class, 'student_id');
    }
}
