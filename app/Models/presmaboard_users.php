<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presmaboard_users extends Model
{
    use HasFactory;
    protected $table = 'presmaboard_user'; // nama tabel sesuai migration kamu

       protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


}
