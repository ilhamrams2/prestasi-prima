<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_ekstrakurikulers';
    protected $fillable = ['nama', 'deskripsi', 'gambar'];
}
