<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['company_id', 'title', 'description', 'location', 'salary', 'is_taken'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
