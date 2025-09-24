<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadUser extends Model
{
    use HasFactory;
    protected $table = 'siakad_users';
    protected $fillable = ['username', 'email', 'password', 'role', 'teacher_id'];

    protected $hidden = ['password', 'remember_token'];

    public function teacher()
    {
        return $this->belongsTo(SiakadTeacher::class, 'teacher_id');
    }
}
