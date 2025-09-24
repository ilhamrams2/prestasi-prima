<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadClass extends Model
{
    use HasFactory;

    protected $table = 'siakad_classes';
    protected $fillable = ['class_name', 'grade', 'major'];

    public function students()
    {
        return $this->hasMany(SiakadStudent::class, 'class_id');
    }
}
