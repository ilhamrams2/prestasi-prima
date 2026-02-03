<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_testimonis';
    protected $fillable = ['nama', 'jabatan', 'pesan', 'foto'];
}
