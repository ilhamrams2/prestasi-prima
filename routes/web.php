<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Response;
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
    IndustriController,
    ProfileSekolahController,
    EkstrakurikulerController,
    ProgramController,
    PenerimaanSiswaController,
    TestimoniController,
    KegiatanController,
    KaryaProyekController,
    ContactController,
    PrestasiController,
    TrafficController,
    FasilitasController,
    HomepageController,
    LulusanPtnController,
};

use App\Http\Controllers\prestasiprima\admin\{
    AdminGalleryController,
    AdminNewsController,
    AdminPrestasiController,
    AdminKegiatanController,
    AdminDashboardController,
    AdminIndustriController,
    AdminStaffController,
    AuthPPController
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


Route::get('/', [HomepageController::class, 'index'])->name('landing');

Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/virtual-tour', 'Tour.VirtualTour')->name('virtual-tour');

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
// Tentang
Route::prefix('tentang')->group(function () {
    Route::get('/program', [ProgramController::class, 'index'])->name('program');
        Route::get('/program/pplg', [ProgramController::class, 'pplg'])->name('program.pplg');
        Route::get('/program/dkv', [ProgramController::class, 'dkv'])->name('program.dkv');
        Route::get('/program/tjkt', [ProgramController::class, 'tjkt'])->name('program.tjkt');
        Route::get('/program/bcf', [ProgramController::class, 'bcf'])->name('program.bcf');
    Route::get('/profile-sekolah', [ProfileSekolahController::class, 'index'])->name('prestasiprima.profile-sekolah');
    Route::get('/staffmanagement', [StaffController::class, 'index'])->name('staff');
    Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
});


// ==================== SISWA ==================== //
Route::prefix('siswa')->group(function () {
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('prestasiprima.ekstrakurikuler');
    Route::get('/karya-proyek', [KaryaProyekController::class, 'index'])->name('karya-proyek');
    Route::get('/karya-proyek/{slug}', [KaryaProyekController::class, 'show'])->name('karya-proyek.show');
});


// ==================== INFORMASI ==================== //
Route::prefix('informasi')->group(function () {
    Route::get('/faq', [FaqController::class, 'index'])->name('faq');

    Route::get('/industri', [IndustriController::class, 'index'])->name('industri.index');
    Route::get('/industri/{slug}', [IndustriController::class, 'show'])->name('industri.show');
    
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::get('/penerimaan-siswa', [PenerimaanSiswaController::class, 'index'])->name('penerimaan.siswa');

    Route::get('/traffic', [TrafficController::class, 'index'])->name('traffic.index');
    Route::post('/traffic/calculate', [TrafficController::class, 'calculateDistance'])->name('traffic.calculate');

    Route::get('/lulusan-ptn', [LulusanPtnController::class, 'index'])->name('lulusan.ptn');
    
});


// ==================== DOKUMENTASI ==================== //
Route::prefix('dokumentasi')->group(function () {
    // Galeri
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

    // Berita
    Route::prefix('berita')->name('berita.')->controller(NewsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/kategori/{slug}', 'category')->name('kategori');
        Route::get('/{slug}', 'show')->name('detail');
    });

    // Kegiatan
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
});

Route::get('/presmacontact', [ContactController::class, 'index'])->name('presmacontact');
Route::post('/presmacontact/send', [ContactController::class, 'sendMessage'])->name('presmacontact.send');

// ==================== PENDAFTARAN ==================== //
Route::controller(Pendaftaran::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
});

Route::controller(FormulirController::class)->group(function () {
    Route::get('/formulir', 'create')->name('pendaftaran.formulir');
    Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
    Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
});


// ============================================================
// ======================= PRESMABOARD ========================
// ============================================================

Route::prefix('presmaboard')->name('presmaboard.')->group(function () {
    Route::get('/', [PresmaboardController::class, 'index'])->name('index');
    Route::get('/eligible/{student}', [PresmaboardController::class, 'eligible'])->name('eligible');

    // Auth
    Route::get('/login', [PresmaboardAuthController::class, 'index'])->name('login');
    Route::post('/login', [PresmaboardAuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [PresmaboardAuthController::class, 'logout'])->name('logout');

    // Admin Area (requires presmaboard auth)
    Route::prefix('admin')->name('admin.')->middleware(['auth:presmaboard'])->group(function () {

        Route::get('/', [PresmaboardDashboardController::class, 'index'])->name('dashboard');
        Route::get('/leaderboard', [PresmaboardController::class, 'index'])->name('leaderboard');

        // Project
        Route::prefix('project')->name('project.')->controller(PresmaboardProjectController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{project}', 'update')->name('update');
            Route::delete('/{project}', 'destroy')->name('destroy');
        });

        // Student
        Route::prefix('student')->name('student.')->controller(PresmaboardStudentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{student}', 'update')->name('update');
            Route::delete('/{student}', 'destroy')->name('destroy');
        });

        // Achievement
        Route::prefix('achievement')->name('achievement.')->controller(PresmaboardAchievementController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{achievement}', 'update')->name('update');
            Route::delete('/{achievement}', 'destroy')->name('destroy');
        });

        // Score
        Route::prefix('score')->name('score.')->controller(PresmaboardScoreController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{score}', 'update')->name('update');
            Route::delete('/{score}', 'destroy')->name('destroy');
        });
    });
});

// ============================================================
// ================ PRESTASIPRIMA LOGIN =======================
// ============================================================

Route::prefix('authPP')->group(function () {
    Route::get('login', [AuthPPController::class, 'showLoginForm'])->name('authPP.login');
    Route::post('login', [AuthPPController::class, 'login'])->name('authPP.login.post');
    Route::post('logout', [AuthPPController::class, 'logout'])->name('authPP.logout');
});

// ============================================================
// ================ PRESTASIPRIMA ADMIN PANEL =================
// ============================================================

Route::middleware(['authPP'])->prefix('prestasiprima/admin')->name('prestasiprima.admin.')->group(function () {

    // === DASHBOARD ===
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // === GALLERY ===
    Route::prefix('gallery')->name('gallery.')->controller(AdminGalleryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === BERITA ===
    Route::prefix('berita')->name('berita.')->controller(AdminNewsController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/{id}', 'show')->name('show');
    });

    // === PRESTASI ===
    Route::prefix('prestasi')->name('prestasi.')->controller(AdminPrestasiController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show'); // route detail prestasi
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === KEGIATAN ===
    Route::prefix('kegiatan')->name('kegiatan.')->controller(AdminKegiatanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === INDUSTRI ===
    Route::prefix('industri')->name('industri.')->controller(AdminIndustriController::class)->group(function () {
        Route::get('/', 'index')->name('index');           // list industri
        Route::get('/create', 'create')->name('create');   // form tambah
        Route::post('/', 'store')->name('store');          // simpan
        Route::get('/{industri}/edit', 'edit')->name('edit');    // form edit
        Route::put('/{industri}', 'update')->name('update');     // update
        Route::delete('/{industri}', 'destroy')->name('destroy');// hapus
    });

    // === STAFF ===
    Route::prefix('staff')->name('staff.')->controller(AdminStaffController::class)->group(function () {
        Route::get('/', 'index')->name('index');            // list staff
        Route::get('/create', 'create')->name('create');    // form tambah staff
        Route::post('/', 'store')->name('store');           // simpan staff baru
        Route::get('/{staff}', 'show')->name('show');       // detail staff
        Route::get('/{staff}/edit', 'edit')->name('edit');  // form edit staff
        Route::put('/{staff}', 'update')->name('update');   // update staff
        Route::delete('/{staff}', 'destroy')->name('destroy'); // hapus staff
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

    // Application Routes (requires auth in production)
Route::prefix('applications')->name('applications.')->group(function () {
    // List & View
    Route::get('/', [ApplicationController::class, 'index'])->name('index');
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('create');
    Route::delete('/{application}', [ApplicationController::class, 'destroy'])->name('destroy');
    
    // Phase 1: Personal Info & Documents
    Route::post('/phase1', [ApplicationController::class, 'storePhase1'])->name('phase1.store');
    // Ajax save for Phase 1 (save personal info without moving to next phase)
    Route::post('/phase1/save', [ApplicationController::class, 'savePhase1Ajax'])->name('phase1.save');
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

    // Application Routes
    Route::get('/jobs/{job}/apply', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('/applications/{application}/phase2', [ApplicationController::class, 'showPhase2'])->name('applications.phase2');
    });
    // close auth middleware group
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

    // Applications - Admin review (approve / reject)
    Route::get('/applications', [ApplicationController::class, 'adminIndex'])->name('applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'adminShow'])->name('applications.show');
    Route::post('/applications/{application}/review', [ApplicationController::class, 'adminReview'])->name('applications.review');
});

// ============================================================
// =================== AUTH VIA PROVIDERS =====================
// ============================================================

// Route::controller(SocialAuthController::class)
//     ->prefix('auth')
//     ->name('social.')
//     ->group(function () {
//         Route::get('{provider}', 'redirect')->name('redirect');
//         Route::get('{provider}/callback', 'callback')->name('callback');
//     });

// ============================================================
// ======================== ERROR PAGES =======================
// ============================================================

// Route::get('/notinternet', fn() => view('errors.notinternet'))->name('notinternet');

// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });
