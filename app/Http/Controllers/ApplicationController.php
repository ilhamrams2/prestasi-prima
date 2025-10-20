<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
     /**
     * Show the application form for Phase 1
     */
    public function create($jobId)
    {
        $job = Job::with('company')->findOrFail($jobId);
        
        // Get current user (for now using ID 1 for testing, replace with auth()->id() in production)
        $userId = 1; // auth()->id();
        
        // Check if user already has an application for this job
        $application = Application::where('job_id', $jobId)
                                  ->where('user_id', $userId)
                                  ->first();
        
        if (view()->exists('applications.create')) {
            return view('applications.create', compact('job', 'application'));
        }

        // Fallback response to avoid "View not found" runtime errors
        return response('View applications.create not found. Create resources/views/applications/create.blade.php', 200);
    }

    /**
     * Store Phase 1 application data
     */
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:presmalancer_jobs,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'source' => 'nullable|string|max:255',
            'resume_type' => 'required|in:upload,drop,none',
            'cover_letter_type' => 'required|in:upload,drop,none',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:5120', // 5MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $userId = 1; // auth()->id();
        $jobId = $request->job_id;

        // Check for duplicate application
        $existingApplication = Application::where('job_id', $jobId)
                                         ->where('user_id', $userId)
                                         ->first();

        if ($existingApplication) {
            return redirect()->route('applications.edit', $existingApplication->id)
                           ->with('info', 'Anda sudah pernah melamar pekerjaan ini. Silakan edit lamaran Anda.');
        }

        // Prepare data
        $data = [
            'job_id' => $jobId,
            'user_id' => $userId,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'source' => $request->source,
            'resume_type' => $request->resume_type,
            'cover_letter_type' => $request->cover_letter_type,
            'status' => 'pending',
            'current_phase' => 1,
            'is_completed' => false,
        ];

        // Handle Resume Upload
        if ($request->resume_type === 'upload' && $request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumePath = $resume->store('resumes', 'public');
            $data['resume_path'] = $resumePath;
        }

        // Handle Cover Letter Upload
        if ($request->cover_letter_type === 'upload' && $request->hasFile('cover_letter')) {
            $coverLetter = $request->file('cover_letter');
            $coverLetterPath = $coverLetter->store('cover_letters', 'public');
            $data['cover_letter_path'] = $coverLetterPath;
        }

        // Create application
        $application = Application::create($data);

        return redirect()->route('applications.phase2', $application->id)
                       ->with('success', 'Data Fase 1 berhasil disimpan! Lanjutkan ke Fase 2.');
    }

    /**
     * Show edit form for existing application
     */
    public function edit($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        $job = $application->job;
        
        if (view()->exists('applications.create')) {
            return view('applications.create', compact('job', 'application'));
        }

        return response('View applications.create not found. Create resources/views/applications/create.blade.php', 200);
    }

    /**
     * Update existing application
     */
    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'source' => 'nullable|string|max:255',
            'resume_type' => 'required|in:upload,drop,none',
            'cover_letter_type' => 'required|in:upload,drop,none',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Update basic data
        $application->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'source' => $request->source,
            'resume_type' => $request->resume_type,
            'cover_letter_type' => $request->cover_letter_type,
        ]);

        // Handle Resume Upload
        if ($request->resume_type === 'upload' && $request->hasFile('resume')) {
            // Delete old resume if exists
            if ($application->resume_path) {
                Storage::disk('public')->delete($application->resume_path);
            }
            
            $resume = $request->file('resume');
            $resumePath = $resume->store('resumes', 'public');
            $application->update(['resume_path' => $resumePath]);
        } elseif ($request->resume_type === 'none' && $application->resume_path) {
            // Remove resume if user chose "none"
            Storage::disk('public')->delete($application->resume_path);
            $application->update(['resume_path' => null]);
        }

        // Handle Cover Letter Upload
        if ($request->cover_letter_type === 'upload' && $request->hasFile('cover_letter')) {
            // Delete old cover letter if exists
            if ($application->cover_letter_path) {
                Storage::disk('public')->delete($application->cover_letter_path);
            }
            
            $coverLetter = $request->file('cover_letter');
            $coverLetterPath = $coverLetter->store('cover_letters', 'public');
            $application->update(['cover_letter_path' => $coverLetterPath]);
        } elseif ($request->cover_letter_type === 'none' && $application->cover_letter_path) {
            // Remove cover letter if user chose "none"
            Storage::disk('public')->delete($application->cover_letter_path);
            $application->update(['cover_letter_path' => null]);
        }

        return redirect()->route('applications.phase2', $application->id)
                       ->with('success', 'Lamaran berhasil diperbarui!');
    }

    /**
     * Delete application
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);

        // Delete uploaded files
        if ($application->resume_path) {
            Storage::disk('public')->delete($application->resume_path);
        }
        if ($application->cover_letter_path) {
            Storage::disk('public')->delete($application->cover_letter_path);
        }

        // Soft delete (can be restored later)
        $application->delete();

        return redirect()->route('jobs.index')
                       ->with('success', 'Lamaran berhasil dihapus.');
    }

    /**
     * Show Phase 2 (Placeholder for now)
     */
    public function showPhase2($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        // Update phase if still in phase 1
        if ($application->current_phase == 1) {
            $application->update(['current_phase' => 2]);
        }
        
        if (view()->exists('applications.phase2')) {
            return view('applications.phase2', compact('application'));
        }

        return response('View applications.phase2 not found. Create resources/views/applications/phase2.blade.php', 200);
    }

    /**
     * Download resume file
     */
    public function downloadResume($id)
    {
        $application = Application::findOrFail($id);
        
        if (!$application->resume_path) {
            abort(404, 'Resume tidak ditemukan.');
        }

        // Ensure file exists on the 'public' disk
        if (!Storage::disk('public')->exists($application->resume_path)) {
            abort(404, 'Resume tidak ditemukan.');
        }

        // Build local path for the "public" disk (storage/app/public)
        $path = storage_path('app/public/' . $application->resume_path);
        if (!file_exists($path)) {
            // Fallback to disk download for non-local drivers
        }
    }
    /**
     * Download cover letter file
     */
    public function downloadCoverLetter($id)
    {
        $application = Application::findOrFail($id);
        
        if (!$application->cover_letter_path) {
            abort(404, 'Surat lamaran tidak ditemukan.');
        }

        // Ensure file exists on the 'public' disk
        if (!Storage::disk('public')->exists($application->cover_letter_path)) {
            abort(404, 'Surat lamaran tidak ditemukan.');
        }

        // Try to use the local path if the file is stored on the local "public" disk
        $localPath = storage_path('app/public/' . $application->cover_letter_path);
        if (file_exists($localPath)) {
            return response()->download($localPath);
        }

        // For remote disks (e.g. s3), stream the file from the disk
        $stream = Storage::disk('public')->readStream($application->cover_letter_path);
        if ($stream === false) {
            abort(404, 'Surat lamaran tidak ditemukan.');
        }

        // Determine mime type: prefer local file detection if available, otherwise guess by extension
        $mime = null;
        $filename = basename($application->cover_letter_path);
        // try using local file path if available
        $localPath = storage_path('app/public/' . $application->cover_letter_path);
        if (file_exists($localPath)) {
            // use PHP's finfo if available, fallback to mime_content_type
            if (function_exists('finfo_open')) {
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                if ($finfo !== false) {
                    $mime = finfo_file($finfo, $localPath);
                    finfo_close($finfo);
                }
            }
            if (!$mime && function_exists('mime_content_type')) {
                $mime = mime_content_type($localPath);
            }
        }

        if (!$mime) {
            // Guess by extension for common document types
            $extension = strtolower(pathinfo($application->cover_letter_path, PATHINFO_EXTENSION));
            switch ($extension) {
                case 'pdf':
                    $mime = 'application/pdf';
                    break;
                case 'doc':
                    $mime = 'application/msword';
                    break;
                case 'docx':
                    $mime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
                    break;
                default:
                    $mime = 'application/octet-stream';
                    break;
            }
        }

        return response()->stream(function () use ($stream) {
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ]);
    }
    

    /**
     * Show user's applications list
     */
    public function index()
    {
        $userId = 1; // auth()->id();
        
        $applications = Application::with(['job.company'])
                                   ->where('user_id', $userId)
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(10);
        
        if (view()->exists('applications.index')) {
            return view('applications.index', compact('applications'));
        }

        return response('View applications.index not found. Create resources/views/applications/index.blade.php', 200);
    }
}