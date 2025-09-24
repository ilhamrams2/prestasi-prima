<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadAttendance extends Model
{
    use HasFactory;
    protected $table = 'siakad_attendance';
    protected $fillable = ['enrollment_id', 'date', 'status'];

    public function enrollment()
    {
        return $this->belongsTo(SiakadEnrollment::class, 'enrollment_id');
    }
}
