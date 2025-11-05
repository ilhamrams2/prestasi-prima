<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class PPuser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    

    // Jika kolom primary key tetap "id", biarkan default
    // Kalau namanya beda, tambahkan: protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        // tambahkan field lain kalau ada
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
