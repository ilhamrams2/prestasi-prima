<?php

namespace App\Models\prestasiprima;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';

    protected $fillable = [
        'ip_address',
        'page_url',
        'referrer',
        'user_agent',
        'device_type',
        'visit_date',
    ];

    /**
     * Scope to get today's visitors.
     */
    public function scopeToday($query)
    {
        return $query->where('visit_date', today());
    }

    /**
     * Scope to get this month's visitors.
     */
    public function scopeThisMonth($query)
    {
        return $query->where('visit_date', '>=', now()->startOfMonth());
    }
}
