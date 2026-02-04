<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PPuser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    const ROLE_SUPER_ADMIN = 'super_admin';
    const ROLE_EDITOR = 'editor';
    const ROLE_MODERATOR = 'moderator';
    const ROLE_VIEWER = 'viewer';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'last_login_at',
        'last_login_ip',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    /**
     * Check if user is Super Admin
     */
    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }

    /**
     * Check if user is Editor
     */
    public function isEditor()
    {
        return $this->role === self::ROLE_EDITOR || $this->isSuperAdmin();
    }

    /**
     * Check if user is Moderator
     */
    public function isModerator()
    {
        return $this->role === self::ROLE_MODERATOR || $this->isSuperAdmin();
    }

    /**
     * Check if user is Viewer
     */
    public function isViewer()
    {
        return $this->role === self::ROLE_VIEWER || $this->isEditor() || $this->isModerator();
    }

    /**
     * Get role label
     */
    public function getRoleLabelAttribute()
    {
        return match($this->role) {
            self::ROLE_SUPER_ADMIN => 'Super Admin',
            self::ROLE_EDITOR => 'Editor',
            self::ROLE_MODERATOR => 'Moderator',
            self::ROLE_VIEWER => 'Viewer',
            default => 'Unknown',
        };
    }
}
