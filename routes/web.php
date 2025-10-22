<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
// ============================================================
// ===================== IMPORT CONTROLLERS ===================
// ============================================================

use App\Http\Controllers\{
    ChatbotController,
    Pendaftaran,
    FormulirController,
    PresmalanceController,
    PresmaAuthController,
    JoblistController,
    CompanyController,
    RegisterLanceController,
    ProfileController,
    AdminJobController,
    ApplicationController,
    SocialAuthController
};

use App\Http\Controllers\prestasiprima\{
    GalleryController,
    NewsController,
    SambutanController,
    FaqController,
    StaffController,
    IndustriController
};

use App\Http\Controllers\prestasiprima\Admin\{
    AdminGalleryController,
    AdminNewsController
};

use App\Http\Controllers\Presmaboard\{
    PresmaboardController,
    AuthController as PresmaboardAuthController,
    DashboardController as PresmaboardDashboardController,
    LeaderboardController as PresmaboardLeaderboardController,
    ProjectController as PresmaboardProjectController,
    StudentController as PresmaboardStudentController,
    AchievementController as PresmaboardAchievementController,
    ScoreController as PresmaboardScoreController
};

// ============================================================
// ======================= HALAMAN UTAMA ======================
// ============================================================

Route::view('/', 'prestasiprima.pages.landing')->name('landing');
Route::view('/welcome', 'welcome')->name('welcome');

// Chatbot
Route::post('/send', [ChatbotController::class, 'send'])->name('chatbot.send');

// Test Google Controller (Opsional)
Route::get('/test-google', function () {
    return class_exists(\App\Http\Controllers\Auth\GoogleController::class)
        ? 'Class found'
        : 'Class NOT found';
});

// ============================================================
// ===================== PRESTASIPRIMA ========================
// ============================================================

Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

Route::controller(Pendaftaran::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
});

Route::controller(FormulirController::class)->group(function () {
    Route::get('/formulir', 'create')->name('pendaftaran.formulir');
    Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
    Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
});

// Galeri
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Berita
Route::prefix('berita')
    ->name('berita.')
    ->controller(NewsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/kategori/{slug}', 'category')->name('kategori');
        Route::get('/{slug}', 'show')->name('detail');
    });

Route::get('/dokumentasi/prestasi', function () {
    return view('prestasiprima.pages.prestasi');
})->name('prestasi');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/staffmanagement', [StaffController::class, 'index'])->name('staff');

Route::get('/dokumentasi/industri', [IndustriController::class, 'index'])
    ->name('industri');


// ============================================================ //
// ======================== PRESMABOARD ======================== //
// ============================================================ //
Route::prefix('presmaboard')->name('presmaboard')->group(function () {

    // Dashboard | Leaderboard
    Route::get('/', [PresmaboardController::class, 'index']);
    Route::get('eligible/{student}', [PresmaboardController::class, 'eligible'])->name('.eligible');

    // Auth
    Route::get('/login', [PresmaboardAuthController::class, 'index'])->name('.login');
    Route::post('/login', [PresmaboardAuthController::class, 'authenticate'])->name('.authenticate');
    Route::get('/logout', [PresmaboardAuthController::class, 'logout'])->name('.logout');


    // -------------------- ADMIN AREA -------------------- //
    Route::prefix('admin')->name('.admin')->group(function () {

        // Dashboard
        Route::get('/', [PresmaboardDashboardController::class, 'index'])->name('.dashboard');

        // Project
        Route::prefix('project')->name('.project')
            ->controller(PresmaboardProjectController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{project}', 'update')->name('.update');
                Route::delete('/{project}', 'destroy')->name('.destroy');
            });

        // Student
        Route::prefix('student')->name('.student')
            ->controller(PresmaboardStudentController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{student}', 'update')->name('.update');
                Route::delete('/{student}', 'destroy')->name('.destroy');
            });

        // Achievement
        Route::prefix('achievement')->name('.achievement')
            ->controller(PresmaboardAchievementController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{achievement}', 'update')->name('.update');
                Route::delete('/{achievement}', 'destroy')->name('.destroy');
            });

        // Score
        Route::prefix('score')->name('.score')
            ->controller(PresmaboardScoreController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{score}', 'update')->name('.update');
                Route::delete('/{score}', 'destroy')->name('.destroy');
            });
    });
});
// ============================================================
// ================ PRESTASIPRIMA ADMIN PANEL =================
// ============================================================

Route::prefix('prestasiprima/admin')->name('prestasiprima.admin.')->group(function () {

    Route::prefix('gallery')->name('gallery.')->controller(AdminGalleryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('berita')->name('berita.')->controller(AdminNewsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

// ============================================================
// ======================= PRESMALANCE ========================
// ============================================================

Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');
Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');

// Google Login via Laravel Socialite
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Manual Auth
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterLanceController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterLanceController::class, 'register'])->name('register.post');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ============================================================
// ==================== JOBS & PROFILE ========================
// ============================================================

Route::middleware(['auth'])->group(function () {
    Route::get('/jobs', [JoblistController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{job}', [JoblistController::class, 'show'])->name('jobs.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.upload-avatar');

    // Applications
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('/applications/{application}/phase2', [ApplicationController::class, 'showPhase2'])->name('applications.phase2');
});

// ============================================================
// ===================== ADMIN JOB PANEL ======================
// ============================================================

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [AdminJobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [AdminJobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [AdminJobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{job}', [AdminJobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [AdminJobController::class, 'destroy'])->name('jobs.destroy');
    Route::post('/jobs/{job}/toggle-status', [AdminJobController::class, 'toggleStatus'])->name('jobs.toggle-status');
    Route::post('/jobs/bulk-delete', [AdminJobController::class, 'bulkDelete'])->name('jobs.bulk-delete');

    // Companies
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
});

// ============================================================
// =================== AUTH VIA PROVIDERS =====================
// ============================================================

Route::controller(SocialAuthController::class)
    ->prefix('auth')
    ->name('social.')
    ->group(function () {
        Route::get('{provider}', 'redirect')->name('redirect');
        Route::get('{provider}/callback', 'callback')->name('callback');
    });

// ============================================================
// ======================== ERROR PAGES =======================
// ============================================================

Route::get('/notinternet', fn() => view('errors.notinternet'))->name('notinternet');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
