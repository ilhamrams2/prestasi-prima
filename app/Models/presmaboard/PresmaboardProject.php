<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaboardProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'judul',
        'deskripsi',
        'gambar',
        'category_id',
    ];

    public function student()
    {
        return $this->belongsTo(PresmaboardStudent::class, 'student_id');
    }

    public function category()
    {
        return $this->belongsTo(PresmaboardProjectCategory::class, 'category_id');
    }


    /**
     * Ambil nama jurusan dalam format huruf besar (untuk tampilan)
     */
    public function getJurusanLabelAttribute()
    {
        return strtoupper($this->jurusan);
    }
}
