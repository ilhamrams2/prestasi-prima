<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'presmalancer_companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'industry',
        'website',
        'description',
        'address',
        'logo',
        'phone',
        'email',
        'size',
        'founded',
    ];

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the jobs for the company.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Get active jobs count
     */
    public function getActiveJobsCountAttribute(): int
    {
        return $this->jobs()->where('is_active', true)->count();
    }

    /**
     * Get total applications count
     */
    public function getTotalApplicationsAttribute(): int
    {
        return Application::whereIn('job_id', $this->jobs->pluck('id'))->count();
    }
}
