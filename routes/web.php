<?php

use Illuminate\Support\Facades\Route;

// ============================================================
// ================ IMPORT CONTROLLERS ========================
// ============================================================

use App\Http\Controllers\{
    ContentManagementController,
    PresmaboardController,
    Pendaftaran,
    FormulirController,
    PresmalanceController,
    PresmaAuthController,
    SocialAuthController,
    Errorcontroller,
    PresmaboardStudentController
};

use App\Http\Controllers\Siakad\{
    AbsenceController,
    AttendanceController,
    Auth\AuthController as SiakadAuthController,
    ClassesController,
    DashboardController,
    EnrollmentsController,
    MajorController,
    ScoreController,
    StudentController,
    SubjectController,
    TeacherController,
    AnnouncementController,
    ProfileController
};

use App\Http\Controllers\Prestasiprima\{
    GalleryController,
    NewsController,
    SambutanController
};


// ============================================================
// ======================== ROUTES ============================
// ============================================================

// -------------------- HALAMAN UTAMA -------------------- //
Route::view('/', 'prestasiprima.pages.landing');
Route::view('/welcome', 'welcome')->name('welcome');

// -------------------- SPLASH & LOGIN -------------------- //
Route::controller(ContentManagementController::class)->group(function () {
    Route::get('/splash/{screen}', 'splashscreen')->where('screen', '[1-4]+')->name('splash.screen');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/splash/login/{role?}', 'splash')->name('splash.login');
});

// -------------------- HALAMAN ERROR -------------------- //
Route::prefix('erorpage')->group(function () {
    Route::view('/notinternet', 'prestasiprima.pages.erorpage.notinternet');
    Route::view('/notfound', 'prestasiprima.pages.erorpage.notfound');
});


// ============================================================
// ===================== PRESTASIPRIMA ========================
// ============================================================

Route::controller(SambutanController::class)->group(function () {
    Route::get('/sambutan', 'index')->name('sambutan');
});

Route::controller(Pendaftaran::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
});

Route::controller(FormulirController::class)->group(function () {
    Route::get('/formulir', 'create')->name('pendaftaran.formulir');
    Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
    Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
});

Route::controller(PresmalanceController::class)->group(function () {
    Route::get('/presmalance', 'presmalance')->name('presmalancer.presmalance');
    Route::get('/login', 'login')->name('login');
    Route::get('/forum', 'forum')->name('forum');
});
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

// -------------------- AUTH SOSIAL -------------------- //
Route::controller(SocialAuthController::class)->prefix('auth')->name('social.')->group(function () {
    Route::get('{provider}', 'redirect')->name('redirect');
    Route::get('{provider}/callback', 'callback')->name('callback');
});

// -------------------- GALERI -------------------- //
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// -------------------- BERITA -------------------- //
Route::prefix('berita')->name('berita.')->controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/kategori/{slug}', 'category')->name('kategori');
    Route::get('/{slug}', 'show')->name('detail');
});


// ============================================================
// ======================== PRESMABOARD ========================
// ============================================================

Route::prefix('presmaboard')->group(function () {

    // -------------------- LOGIN -------------------- //
    Route::view('/admin/login', 'presmaboard.login')->name('presmaboard.login');
    Route::post('/admin/login', [PresmaboardController::class, 'login'])->name('presmaboard.login.submit');

    // -------------------- ADMIN AREA -------------------- //
    Route::prefix('admin')->controller(PresmaboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('presmaboard.dashboard');
        Route::get('/leaderboard', 'leaderboard')->name('presmaboard.leaderboard');
        Route::get('/project', 'project')->name('presmaboard.project');
        Route::get('/prestasi', 'prestasi')->name('presmaboard.prestasi');
        Route::get('/nilai-pkp', 'nilai_pkp')->name('presmaboard.nilai_pkp');
        Route::post('/logout', 'logout')->name('presmaboard.logout');
    });

    // -------------------- CRUD SISWA -------------------- //
    Route::prefix('admin/siswa')->name('presmaboard.siswa.')
        ->controller(PresmaboardStudentController::class)
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}', 'show')->name('show');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/statistics', 'getStatistics')->name('statistics');
        });
});


// ============================================================
// ========================== SIAKAD ===========================
// ============================================================

Route::prefix('siakad')->name('siakad.')->group(function () {

    // -------------------- AUTH -------------------- //
    Route::controller(SiakadAuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->name('login.submit');
        Route::get('/logout', 'logout')->name('logout');
        Route::resource('users', SiakadAuthController::class)->except(['create', 'edit']);
    });

    // -------------------- HALAMAN LOGIN VIEW -------------------- //
    Route::view('/auth/login', 'siakad.auth.siakad-login');

    // -------------------- DASHBOARD -------------------- //
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // -------------------- ROUTE DENGAN AUTH -------------------- //
    Route::middleware('auth:siakad')->group(function () {
        Route::resources([
            'majors'        => MajorController::class,
            'classes'       => ClassesController::class,
            'teachers'      => TeacherController::class,
            'students'      => StudentController::class,
            'subjects'      => SubjectController::class,
            'enrollments'   => EnrollmentsController::class,
            'scores'        => ScoreController::class,
            'absence'       => AbsenceController::class,
            'announcements' => AnnouncementController::class,
        ], ['except' => ['create', 'edit']]);

        // -------------------- PROFILE -------------------- //
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    });
});
