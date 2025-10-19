<?php

namespace App\Models\presmaboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresmaboardProjectCategory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jurusan'
    ];
}
