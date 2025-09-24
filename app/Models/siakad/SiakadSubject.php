<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadSubject extends Model
{
    use HasFactory;
    protected $table = 'siakad_subjects';
    protected $fillable = ['subject_code', 'name', 'group'];

    public function enrollments()
    {
        return $this->hasMany(SiakadEnrollment::class, 'subject_id');
    }
}
