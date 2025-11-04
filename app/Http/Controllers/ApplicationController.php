<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    // ============================================
    // PHASE 1: Personal Info & Documents
    // ============================================
    
    /**
     * Show the application form for Phase 1
     */
    public function create($jobId)
    {
        $job = Job::with('company')->findOrFail($jobId);
        
    // Use authenticated user id when available, fall back to 1 for local/testing
    $userId = auth()->id() ?? 1;
        
        // Check if user already has an application for this job
        $application = Application::where('job_id', $jobId)
                                  ->where('user_id', $userId)
                                  ->first();
        
        return view('pressmalancer.applications.create', compact('job', 'application'));
    }

    /**
     * Store Phase 1 application data
     */
    public function storePhase1(Request $request)
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

    // Use authenticated user id when available, fall back to 1 for local/testing
    $userId = auth()->id() ?? 1;
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
     * Save Phase 1 via AJAX (returns JSON) — used by the "Simpan" button to save without redirecting.
     */
    public function savePhase1Ajax(Request $request)
    {
        // Very similar validation as storePhase1 but returns JSON and does not redirect to phase2
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
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $userId = auth()->id() ?? 1;
        $jobId = $request->job_id;

        // If an application exists for this user & job, update it; otherwise create
        $application = Application::where('job_id', $jobId)
                                  ->where('user_id', $userId)
                                  ->first();

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
            'status' => $application->status ?? 'pending',
            'current_phase' => $application->current_phase ?? 1,
            'is_completed' => $application->is_completed ?? false,
        ];

        // Handle Resume Upload
        if ($request->resume_type === 'upload' && $request->hasFile('resume')) {
            // If updating, delete the old file
            if ($application && $application->resume_path) {
                Storage::disk('public')->delete($application->resume_path);
            }
            $resumePath = $request->file('resume')->store('resumes', 'public');
            $data['resume_path'] = $resumePath;
        } elseif ($request->resume_type === 'none' && $application && $application->resume_path) {
            Storage::disk('public')->delete($application->resume_path);
            $data['resume_path'] = null;
        }

        // Handle Cover Letter Upload
        if ($request->cover_letter_type === 'upload' && $request->hasFile('cover_letter')) {
            if ($application && $application->cover_letter_path) {
                Storage::disk('public')->delete($application->cover_letter_path);
            }
            $coverLetterPath = $request->file('cover_letter')->store('cover_letters', 'public');
            $data['cover_letter_path'] = $coverLetterPath;
        } elseif ($request->cover_letter_type === 'none' && $application && $application->cover_letter_path) {
            Storage::disk('public')->delete($application->cover_letter_path);
            $data['cover_letter_path'] = null;
        }

        if ($application) {
            $application->update($data);
        } else {
            $application = Application::create($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Informasi anda telah disimpan!',
            'application_id' => $application->id,
        ]);
    }

    /**
     * Update Phase 1 data
     */
    public function updatePhase1(Request $request, $id)
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
                       ->with('success', 'Fase 1 berhasil diperbarui!');
    }

    // ============================================
    // PHASE 2: Company Questions
    // ============================================

    /**
     * Show Phase 2 - Company Questions
     */
    public function showPhase2($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        // Update phase if still in phase 1
        if ($application->current_phase == 1) {
            $application->update(['current_phase' => 2]);
        }
        
        return view('pressmalancer.applications.phase2', compact('application'));
    }

    /**
     * Store Phase 2 - Company Questions Answers
     */
    public function storePhase2(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        // Validation (customize based on company questions)
        $validator = Validator::make($request->all(), [
            'answers' => 'nullable|array',
            'answers.*' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Store answers as JSON
        $application->update([
            'phase2_answers' => $request->answers ?? [],
            'current_phase' => 2,
        ]);

    // Redirect to the Phase 3 show route so the $templates array is prepared
    // by showPhase3(). Returning the view here omitted $templates and caused
    // an undefined variable error in the Blade template.
    return redirect()->route('applications.phase3', $application->id)
               ->with('success', 'Fase 2 berhasil disimpan! Lanjutkan ke Fase 3.');
    }

    // ============================================
    // PHASE 3: Design Draft / Template Selection
    // ============================================

    /**
     * Show Phase 3 - Design Draft
     */
    public function showPhase3($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        // Update phase if still in phase 2
        if ($application->current_phase == 2) {
            $application->update(['current_phase' => 3]);
        }
        
        // Available templates
        $templates = [
            'modern_professional' => [
                'name' => 'Modern Professional',
                'description' => 'Clean dan modern untuk perusahaan teknologi',
            ],
            'corporate_classic' => [
                'name' => 'Corporate Classic',
                'description' => 'Format dan professional untuk perusahaan besar',
            ],
            'creative_design' => [
                'name' => 'Creative Design',
                'description' => 'Kreatif dan eye-catching untuk industri kreatif',
            ],
            'minimal_clean' => [
                'name' => 'Minimal Clean',
                'description' => 'Simpel dan minimalis untuk semua industri',
            ],
            'manual' => [
                'name' => 'Manual',
                'description' => 'Buat desain sendiri (unggah file atau beri instruksi desain)',
            ],
        ];
        
        return view('pressmalancer.applications.phase3', compact('application', 'templates'));
    }

    /**
     * Store Phase 3 - Template Selection
     */
    public function storePhase3(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'template_choice' => 'required|in:modern_professional,corporate_classic,creative_design,minimal_clean',
            'cover_letter_text' => 'nullable|string|max:5000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Store template selection
        $application->update([
            'template_choice' => $request->template_choice,
            'cover_letter_text' => $request->cover_letter_text,
            'current_phase' => 3,
        ]);

        return view('pressmalancer.applications.phase4', compact('application'))
                       ->with('success', 'Fase 3 berhasil disimpan! Lanjutkan ke Review Final.');
    }

    // ============================================
    // PHASE 4: Review & Submit
    // ============================================

    /**
     * Show Phase 4 - Review & Submit
     */
    public function showPhase4($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        // Update phase if still in phase 3
        if ($application->current_phase == 3) {
            $application->update(['current_phase' => 4]);
        }
        
        return view('pressmalancer.applications.phase4', compact('application'));
    }

    /**
     * Submit Final Application (Phase 4)
     */
    public function submitFinal(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        // Validation
        $validator = Validator::make($request->all(), [
            'final_notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        // Mark as completed and submitted
        $application->update([
            'final_notes' => $request->final_notes,
            'current_phase' => 4,
            'is_completed' => true,
            'submitted_at' => now(),
            'status' => 'pending', // Set to pending for admin review
        ]);

        return view('pressmalancer.applications.success', compact('application'))
                       ->with('success', 'Lamaran berhasil dikirim! Terima kasih sudah melamar.');
    }

    /**
     * Show success page after submission
     */
    public function success($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        return view('pressmalancer.applications.success', compact('application'));
    }

    // ============================================
    // GENERAL CRUD OPERATIONS
    // ============================================

    /**
     * Show user's applications list
     */
    public function index()
    {
    // Use authenticated user id when available, fall back to 1 for local/testing
    $userId = auth()->id() ?? 1;
        
        $applications = Application::with(['job.company'])
                                   ->where('user_id', $userId)
                                   ->orderBy('created_at', 'desc')
                                   ->paginate(10);

        return view('pressmalancer.applications.index', compact('applications'));
    }

    /**
     * Show edit form for existing application
     */
    public function edit($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        $job = $application->job;
        
        return view('pressmalancer.applications.create', compact('job', 'application'));
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

    // ============================================
    // FILE DOWNLOAD OPERATIONS
    // ============================================

    /**
     * Download resume file
     */
    public function downloadResume($id)
    {
        $application = Application::findOrFail($id);
        
        if (!$application->resume_path) {
            abort(404, 'Resume tidak ditemukan.');
        }
        // Prefer checking the public disk; resolve to the local storage path and return download
        if (!Storage::disk('public')->exists($application->resume_path)) {
            // Fallback to local storage path
            $filePath = $this->resolvePublicStoragePath($application->resume_path);
            if (!file_exists($filePath)) {
                abort(404, 'Resume file not found.');
            }
            return response()->download($filePath);
        }

        // Resolve to the local storage path and return download
        $filePath = $this->resolvePublicStoragePath($application->resume_path);
        if (!file_exists($filePath)) {
            abort(404, 'Resume file not found.');
        }

        return response()->download($filePath);
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
        if (!Storage::disk('public')->exists($application->cover_letter_path)) {
            $filePath = $this->resolvePublicStoragePath($application->cover_letter_path);
            if (!file_exists($filePath)) {
                abort(404, 'Surat lamaran file not found.');
            }
            return response()->download($filePath);
        }

        $filePath = $this->resolvePublicStoragePath($application->cover_letter_path);
        if (!file_exists($filePath)) {
            abort(404, 'Surat lamaran file not found.');
        }

        return response()->download($filePath);
    }

    // ============================================
    // EDIT INDIVIDUAL PHASES FROM PHASE 4
    // ============================================

    /**
     * Edit Phase 1 from Phase 4 review
     */
    public function editPhase1FromReview($id)
    {
        // Reuse the existing edit() method to avoid duplicated implementation
        return $this->edit($id);
    }

    /**
     * Edit Phase 2 from Phase 4 review
     */
    public function editPhase2FromReview($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        return view('pressmalancer.applications.phase2', compact('application'));
    }

    /**
     * Edit Phase 3 from Phase 4 review
     */
    public function editPhase3FromReview($id)
    {
        $application = Application::with('job.company')->findOrFail($id);
        
        $templates = [
            'modern_professional' => [
                'name' => 'Modern Professional',
                'description' => 'Clean dan modern untuk perusahaan teknologi',
            ],
            'corporate_classic' => [
                'name' => 'Corporate Classic',
                'description' => 'Format dan professional untuk perusahaan besar',
            ],
            'creative_design' => [
                'name' => 'Creative Design',
                'description' => 'Kreatif dan eye-catching untuk industri kreatif',
            ],
            'minimal_clean' => [
                'name' => 'Minimal Clean',
                'description' => 'Simpel dan minimalis untuk semua industri',
            ],
        ];
        
        return view('pressmalancer.applications.phase3', compact('application', 'templates'));
    }

    /**
     * Resolve a public storage path for a given stored file key.
     * Centralizes the literal 'app/public/' to avoid duplication.
     */
    private function resolvePublicStoragePath(string $key): string
    {
        return storage_path('app/public/' . $key);
    }

    // ============================================
    // ADMIN: Review / Approve / Reject
    // ============================================

    /**
     * Show application details for admin review
     */
    public function adminShow($id)
    {
        $application = Application::with(['job.company', 'user'])->findOrFail($id);

        return view('pressmalancer.admin.applications.ApplicationDashboard', compact('application'));
    }

    /**
     * Admin index - list applications for review
     */
    public function adminIndex(Request $request)
    {
        $query = Application::with(['job.company', 'user'])->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->paginate(20);

        return view('pressmalancer.admin.applications.index', compact('applications'));
    }

    /**
     * Admin reviews (approve/reject) an application
     */
    public function adminReview(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'decision' => 'required|in:accepted,rejected',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $decision = $request->decision;

        $application->update([
            'status' => $decision,
            'admin_notes' => $request->admin_notes,
            'reviewed_by' => auth()->id() ?? 1,
            'reviewed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Keputusan disimpan: ' . ucfirst($decision));
    }
}

