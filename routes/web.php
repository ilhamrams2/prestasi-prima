<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RegisterLanceController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ChatbotController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/test-google', function() {
    return class_exists(\App\Http\Controllers\Auth\GoogleController::class) ? 'Class found' : 'Class NOT found';
});



Route::post('/send', [ChatbotController::class, 'send'])->name('chatbot.send');

// Landing Page
Route::get('/', function () {
    return view('prestasiprima.pages.landing');
});

// Welcome Page
Route::get('/welcome', fn() => view('welcome'));

// Sambutan
Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

// Pendaftaran
Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');

// Formulir Pendaftaran
Route::get('/formulir', [FormulirController::class, 'create'])->name('pendaftaran.formulir');
Route::post('/formulir', [FormulirController::class, 'store'])->name('pendaftaran.formulir.store');

// Validasi Pendaftaran
Route::get('/validasi', [FormulirController::class, 'validasi'])->name('pendaftaran.validasi');

// Presmalance Main Page
Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');

// Forum
Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');

// ==================== AUTH SECTION ====================

// Login Manual (Form)
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

// Register Manual (Form)
Route::get('/register', [RegisterLanceController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterLanceController::class, 'register'])->name('register.post');

// Google Login via Laravel Socialite
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ==================== PUBLIC JOBS (HARUS LOGIN) ====================
Route::middleware(['auth'])->group(function () {
    Route::get('/jobs', [JoblistController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JoblistController::class, 'show'])->name('jobs.show');
});


// ==================== PROFILE (AUTH REQUIRED) ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.upload-avatar');
});

// ==================== ADMIN PANEL ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('jobs.index');
    
    // Jobs Management
    Route::get('/jobs/create', [AdminJobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [AdminJobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [AdminJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [AdminJobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [AdminJobController::class, 'destroy'])->name('jobs.destroy');
    Route::post('/jobs/{job}/toggle-status', [AdminJobController::class, 'toggleStatus'])->name('jobs.toggle-status');
    Route::post('/jobs/bulk-delete', [AdminJobController::class, 'bulkDelete'])->name('jobs.bulk-delete');

    // Companies Management
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

// Application Routes (requires auth in production)
Route::prefix('applications')->name('applications.')->group(function () {
    // List & View
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('create');
    Route::delete('/{application}', [ApplicationController::class, 'destroy'])->name('destroy');
    
    // Phase 1: Personal Info & Documents
    Route::post('/phase1', [ApplicationController::class, 'storePhase1'])->name('phase1.store');
    Route::put('/{application}/phase1', [ApplicationController::class, 'updatePhase1'])->name('phase1.update');
    Route::get('/{application}/phase1/edit', [ApplicationController::class, 'editPhase1FromReview'])->name('phase1.edit');
    
    // Phase 2: Company Questions
    Route::get('/{application}/phase2', [ApplicationController::class, 'showPhase2'])->name('phase2');
    Route::post('/{application}/phase2', [ApplicationController::class, 'storePhase2'])->name('phase2.store');
    Route::get('/{application}/phase2/edit', [ApplicationController::class, 'editPhase2FromReview'])->name('phase2.edit');
    
    // Phase 3: Design Draft / Template
    Route::get('/{application}/phase3', [ApplicationController::class, 'showPhase3'])->name('phase3');
    Route::post('/{application}/phase3', [ApplicationController::class, 'storePhase3'])->name('phase3.store');
    Route::get('/{application}/phase3/edit', [ApplicationController::class, 'editPhase3FromReview'])->name('phase3.edit');
    
    // Phase 4: Review & Submit
    Route::get('/{application}/phase4', [ApplicationController::class, 'showPhase4'])->name('phase4');
    Route::post('/{application}/submit', [ApplicationController::class, 'submitFinal'])->name('submit');
    Route::get('/{application}/success', [ApplicationController::class, 'success'])->name('success');
    
    // File Downloads
    Route::get('/{application}/download-resume', [ApplicationController::class, 'downloadResume'])->name('download-resume');
    Route::get('/{application}/download-cover-letter', [ApplicationController::class, 'downloadCoverLetter'])->name('download-cover-letter');
    
    // Legacy routes (for backward compatibility)
    Route::get('/{application}/edit', [ApplicationController::class, 'edit'])->name('edit');
});

// Application Routes
Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
Route::get('/applications/{application}/phase2', [ApplicationController::class, 'showPhase2'])->name('applications.phase2');

