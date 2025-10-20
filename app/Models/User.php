<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // ✅ Tambahan ini penting

class User extends Authenticatable
{
    use HasApiTokens, Notifiable; // ✅ Tambahan HasApiTokens di sini

    protected $table = 'presmalancer_users';

    protected $fillable = [
        'google_id',
        'name',
        'email',
        'password',
        'avatar',
        'role',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi
    public function company()
    {
        return $this->hasOne(Company::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Role checkers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isCompany(): bool
    {
        return $this->role === 'company';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}
