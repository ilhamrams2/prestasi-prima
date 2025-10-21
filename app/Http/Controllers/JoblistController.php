<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JoblistController extends Controller
{
    /**
     * Display a listing of active jobs for public view.
     */
    public function index(Request $request)
    {
        $query = Job::with('company')->active()->latest();

        // Filter pencarian
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }

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

        return view('pressmalancer.pages.Joblist', compact('jobs'));
    }

    /**
     * Show the form to apply for a specific job.
     */
    public function show(Job $job)
    {
        $job->load('company', 'applications.user');
        return view('pressmalancer.applications.create', compact('job'));
    }
}

