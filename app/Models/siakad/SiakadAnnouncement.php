<?php

namespace App\Models\siakad;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadAnnouncement extends Model
{
    use HasFactory;

    protected $table = 'siakad_announcements'; // nama tabel di database

    protected $fillable = [
        'title',
        'content',
    ];
}
