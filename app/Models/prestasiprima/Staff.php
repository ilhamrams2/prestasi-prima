<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_staff';

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'kutipan',
        'kategori',
    ];
}
