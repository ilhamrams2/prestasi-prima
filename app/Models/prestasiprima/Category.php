<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'prestasiprima_categories';

    protected $fillable = ['name', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }
}

