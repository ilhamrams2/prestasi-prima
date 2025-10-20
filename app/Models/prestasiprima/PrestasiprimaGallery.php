<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiprimaGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'video_url',
        'thumbnail',
        'description',
    ];
}

