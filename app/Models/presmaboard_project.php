<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_project extends Model
{
    use HasFactory;




    protected $table = 'presmaboard_project';

    protected $fillable = [
        'student_id',
        'judul_project',
        'deskripsi',
        'gambar',
        'kategori',
    ];

    public function student()
    {
        return $this->belongsTo(presmaboard_student::class, 'student_id');
    }

public static function getCategoriesByMajor($major)
{
    $categories = config('portfolio');

    if (!$categories) {
        return [];
    }

    return $categories[$major] ?? [];
}


    /**
     * Ambil nama jurusan dalam format huruf besar (untuk tampilan)
     */
    public function getJurusanLabelAttribute()
    {
        return strtoupper($this->jurusan);
    }


}