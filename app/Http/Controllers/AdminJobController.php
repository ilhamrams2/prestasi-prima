<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminJobController extends Controller
{
    /**
     * Display a listing of jobs in admin panel.
     */
    public function index(Request $request)
    {
        $query = Job::with('company')
            ->orderBy('created_at', 'desc');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('company', function($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Filter by job type
        if ($request->has('job_type') && $request->job_type != '') {
            $query->where('job_type', $request->job_type);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('is_active', $request->status === 'active' ? 1 : 0);
        }

        // Filter by company
        if ($request->has('company_id') && $request->company_id != '') {
            $query->where('company_id', $request->company_id);
        }

        $jobs = $query->paginate(15);
        $companies = Company::orderBy('company_name')->get();
        
        // Statistics
        $stats = [
            'total' => Job::count(),
            'active' => Job::where('is_active', 1)->count(),
            'inactive' => Job::where('is_active', 0)->count(),
            'expired' => Job::where('deadline', '<', now())->where('is_active', 1)->count(),
        ];

        return view('pressmalancer.admin.jobs.index', compact('jobs', 'companies', 'stats'));
    }

    /**
     * Show the form for creating a new job.
     */
    public function create()
    {
        $companies = Company::orderBy('company_name')->get();
        $jobTypes = ['Full Time', 'Part Time', 'Contract', 'Freelance', 'Internship', 'Remote Work'];
        
        return view('pressmalancer.admin.jobs.create', compact('companies', 'jobTypes'));
    }

    /**
     * Store a newly created job in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:presmalancer_companies,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:150',
            'job_type' => 'required|string|in:Full Time,Part Time,Contract,Freelance,Internship,Remote Work',
            'salary_range' => 'nullable|string|max:100',
            'deadline' => 'nullable|date|after:today',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $job = Job::create([
                'company_id' => $request->company_id,
                'title' => $request->title,
                'description' => $request->description,
                'requirements' => $request->requirements,
                'location' => $request->location,
                'job_type' => $request->job_type,
                'salary_range' => $request->salary_range,
                'deadline' => $request->deadline,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            DB::commit();

            return redirect()->route('admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified job.
     */
    public function edit(Job $job)
    {
        $companies = Company::orderBy('company_name')->get();
        $jobTypes = ['Full Time', 'Part Time', 'Contract', 'Freelance', 'Internship', 'Remote Work'];
        
        return view('pressmalancer.admin.jobs.edit', compact('job', 'companies', 'jobTypes'));
    }

    /**
     * Update the specified job in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validator = Validator::make($request->all(), [
            'company_id' => 'required|exists:presmalancer_companies,id',
            'title' => 'required|string|max:150',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'location' => 'required|string|max:150',
            'job_type' => 'required|string|in:Full Time,Part Time,Contract,Freelance,Internship,Remote Work',
            'salary_range' => 'nullable|string|max:100',
            'deadline' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $job->update([
                'company_id' => $request->company_id,
                'title' => $request->title,
                'description' => $request->description,
                'requirements' => $request->requirements,
                'location' => $request->location,
                'job_type' => $request->job_type,
                'salary_range' => $request->salary_range,
                'deadline' => $request->deadline,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);

            DB::commit();

            return redirect()->route('admin.jobs.index')
                ->with('success', 'Lowongan kerja berhasil diupdate!');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified job from storage.
     */
    public function destroy(Job $job)
    {
        try {
            $jobTitle = $job->title;
            $job->delete();

            return redirect()->route('admin.jobs.index')
                ->with('success', "Lowongan '{$jobTitle}' berhasil dihapus!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle job active status
     */
    public function toggleStatus(Job $job)
    {
        try {
            $job->update([
                'is_active' => !$job->is_active
            ]);

            $status = $job->is_active ? 'diaktifkan' : 'dinonaktifkan';

            return response()->json([
                'success' => true,
                'message' => "Lowongan berhasil {$status}!",
                'is_active' => $job->is_active
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk delete jobs
     */
    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_ids' => 'required|array',
            'job_ids.*' => 'exists:presmalancer_jobs,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid'
            ], 422);
        }

        try {
            $count = Job::whereIn('id', $request->job_ids)->delete();

            return response()->json([
                'success' => true,
                'message' => "{$count} lowongan berhasil dihapus!"
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
