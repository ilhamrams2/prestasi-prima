<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MikrotikTrainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'role',
        'description',
        'photo',
        'is_active',
    ];

    public function certificates()
    {
        return $this->hasMany(MikrotikCertificate::class, 'trainer_id');
    }
}
