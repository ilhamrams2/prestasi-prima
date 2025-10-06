<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $table = 'presmalancer_jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'requirements',
        'location',
        'job_type',
        'salary_range',
        'deadline',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'deadline' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the company that owns the job.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the applications for the job.
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the time ago string for display
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get requirements as array
     */
    public function getRequirementsArrayAttribute(): array
    {
        // Parse requirements from comma-separated or newline-separated string
        return array_filter(array_map('trim', preg_split('/[,\n]+/', $this->requirements ?? '')));
    }

    /**
     * Get company name
     */
    public function getCompanyNameAttribute(): string
    {
        return $this->company ? $this->company->company_name : 'Unknown Company';
    }

    /**
     * Get company logo
     */
    public function getCompanyLogoAttribute(): ?string
    {
        return $this->company ? $this->company->logo : null;
    }

    /**
     * Check if deadline has passed
     */
    public function getIsExpiredAttribute(): bool
    {
        return $this->deadline && $this->deadline->isPast();
    }

    /**
     * Get applications count
     */
    public function getApplicationsCountAttribute(): int
    {
        return $this->applications()->count();
    }

    /**
     * Scope a query to only include active jobs.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where(function($q) {
                         $q->whereNull('deadline')
                           ->orWhere('deadline', '>=', Carbon::today());
                     });
    }

    /**
     * Scope a query to search jobs.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('requirements', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%")
              ->orWhereHas('company', function($query) use ($search) {
                  $query->where('company_name', 'like', "%{$search}%");
              });
        });
    }

    /**
     * Scope a query to filter by location.
     */
    public function scopeByLocation($query, $location)
    {
        if ($location && $location !== 'Semua Lokasi') {
            return $query->where('location', 'like', "%{$location}%");
        }
        return $query;
    }

    /**
     * Scope a query to filter by job type.
     */
    public function scopeByType($query, $type)
    {
        if ($type) {
            return $query->where('job_type', $type);
        }
        return $query;
    }

    /**
     * Scope a query to filter by company.
     */
    public function scopeByCompany($query, $companyId)
    {
        if ($companyId) {
            return $query->where('company_id', $companyId);
        }
        return $query;
    }
}
