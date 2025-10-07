<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RegisterLanceController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminJobController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('prestasiprima.pages.landing');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Sambutan
Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

// Pendaftaran
Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');

// Formulir Pendaftaran
Route::get('/formulir', [FormulirController::class, 'create'])->name('pendaftaran.formulir');
Route::post('/formulir', [FormulirController::class, 'store'])->name('pendaftaran.formulir.store');

// Validasi Pendaftaran
Route::get('/validasi', [FormulirController::class, 'validasi'])->name('pendaftaran.validasi');
Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');

// Login Routes
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

// Registration Routes
Route::get('/register', [RegisterLanceController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterLanceController::class, 'register'])->name('register.post');

// Social Authentication Routes
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');
// Public Routes
Route::get('/jobs', [JoblistController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JoblistController::class, 'show'])->name('jobs.show');

// Profile Routes (requires auth in production)
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.upload-avatar');

// Admin Routes (Add authentication middleware in production)
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Jobs Management
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('jobs.index');
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

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');