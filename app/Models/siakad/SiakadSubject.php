<?php

namespace App\Models\Siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadSubject extends Model
{
    use HasFactory;

    protected $table = 'siakad_subjects';

    protected $fillable = [
        'subject_code',
        'subject_name',
        'subject_group',
    ];
}
