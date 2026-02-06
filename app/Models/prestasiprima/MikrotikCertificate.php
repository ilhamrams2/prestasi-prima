<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MikrotikCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'title',
        'verify_id',
        'image',
    ];

    public function trainer()
    {
        return $this->belongsTo(MikrotikTrainer::class, 'trainer_id');
    }
}
