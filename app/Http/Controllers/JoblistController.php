<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JoblistController extends Controller
{
    /**
     * Display a listing of jobs for public view.
     */
    public function index(Request $request)
    {
        $query = Job::with('company')->active()->latest();

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Location filter
        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }

        // Type filter
        if ($request->filled('filters')) {
            $filters = $request->filters;
            $query->where(function($q) use ($filters) {
                foreach ($filters as $filter) {
                    if ($filter === 'Remote Work') {
                        $q->orWhere('location', 'like', '%Remote%');
                    } elseif (in_array($filter, ['Full Time', 'Part Time', 'Contract', 'Freelance', 'Internship'])) {
                        $q->orWhere('job_type', $filter);
                    }
                }
            });
        }

        $jobs = $query->paginate(10);

        // Transform jobs for display
        $jobs->getCollection()->transform(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'company' => $job->company_name,
                'location' => $job->location,
                'salary' => $job->salary_range,
                'type' => $job->job_type,
                'time' => $job->time_ago,
                'description' => $job->description,
                'requirements' => $job->requirements_array,
                'logo' => $job->company_logo,
                'is_bookmarked' => false,
                'deadline' => $job->deadline ? $job->deadline->format('d M Y') : null,
            ];
        });

        return view('pressmalancer.pages.joblist', compact('jobs'));
    }

    /**
     * Display the admin jobs management page.
     */
    public function adminIndex(Request $request)
    {
        $query = Job::with('company')->latest();

        // Search in admin
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        // Filter by company (if specified)
        if ($request->filled('company_id')) {
            $query->byCompany($request->company_id);
        }

        $jobs = $query->paginate(15);
        $companies = Company::orderBy('company_name')->get();

       return view('pressmalancer.admin.adminJobs', compact('jobs', 'companies'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        $companies = Company::orderBy('company_name')->get();
        return view('pressmalancer.admin.jobs.create', compact('companies'));
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:presmalancer_companies,id',
            'title' => 'required|string|max:150',
            'location' => 'required|string|max:150',
            'salary_range' => 'required|string|max:100',
            'job_type' => 'required|in:Full Time,Part Time,Contract,Freelance,Internship',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job = Job::create([
            'company_id' => $request->company_id,
            'title' => $request->title,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'deadline' => $request->deadline,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Lowongan kerja berhasil ditambahkan!');
    }

    /**
     * Display the specified job.
     */
    public function show(Job $job)
    {
        $job->load('company', 'applications.user');
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        $job->load('company');
        $companies = Company::orderBy('company_name')->get();
        return view('admin.jobs.edit', compact('job', 'companies'));
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:presmalancer_companies,id',
            'title' => 'required|string|max:150',
            'location' => 'required|string|max:150',
            'salary_range' => 'required|string|max:100',
            'job_type' => 'required|in:Full Time,Part Time,Contract,Freelance,Internship',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job->update([
            'company_id' => $request->company_id,
            'title' => $request->title,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'deadline' => $request->deadline,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Lowongan kerja berhasil diperbarui!');
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Lowongan kerja berhasil dihapus!');
    }

    /**
     * Toggle job active status.
     */
    public function toggleStatus(Job $job)
    {
        $job->update(['is_active' => !$job->is_active]);

        $status = $job->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->back()
            ->with('success', "Lowongan kerja berhasil {$status}!");
    }
}
