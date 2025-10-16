<?php

use Illuminate\Support\Facades\Route;

// ============================================================ //
// ==================== IMPORT CONTROLLERS ===================== //
// ============================================================ //

use App\Http\Controllers\{
    ContentManagementController,
    PresmaboardController,
    SambutanController,
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
    NewsController
};

// ============================================================ //
// ========================= ROUTES ============================ //
// ============================================================ //


// -------------------- HALAMAN UTAMA -------------------- //
Route::get('/', fn() => view('prestasiprima.pages.landing'));
Route::get('/welcome', fn() => view('welcome'))->name('welcome');


// -------------------- SPLASH & LOGIN -------------------- //
Route::get('/splash/{screen}', [ContentManagementController::class, 'splashscreen'])
    ->where('screen', '[1-4]+')
    ->name('splash.screen');

Route::post('/logout', [ContentManagementController::class, 'logout'])->name('logout');

Route::get('/splash/login/{role?}', [ContentManagementController::class, 'splash'])
    ->name('splash.login');


// -------------------- HALAMAN ERROR -------------------- //
Route::prefix('erorpage')->group(function () {
    Route::view('/notinternet', 'prestasiprima.pages.erorpage.notinternet');
    Route::view('/notfound', 'prestasiprima.pages.erorpage.notfound');
});


// ============================================================ //
// ===================== PRESTASIPRIMA ======================== //
// ============================================================ //

Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');
Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');

Route::get('/formulir', [FormulirController::class, 'create'])->name('pendaftaran.formulir');
Route::post('/formulir', [FormulirController::class, 'store'])->name('pendaftaran.formulir.store');
Route::get('/validasi', [FormulirController::class, 'validasi'])->name('pendaftaran.validasi');

Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');


// -------------------- AUTH SOSIAL -------------------- //
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');


// -------------------- GALERI PRESTASI PRIMA -------------------- //
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');


// -------------------- HALAMAN BERITA PRESTASI PRIMA -------------------- //
Route::prefix('berita')->name('berita.')->group(function () {
    // Halaman index berita
    Route::get('/', [NewsController::class, 'index'])->name('index');

    // Halaman kategori berita
    Route::get('/kategori/{slug}', [NewsController::class, 'category'])->name('kategori');

    // Halaman detail berita
    Route::get('/{slug}', [NewsController::class, 'show'])->name('detail');
});


// ============================================================ //
// ======================== PRESMABOARD ======================== //
// ============================================================ //

Route::prefix('presmaboard')->group(function () {

    // -------------------- LOGIN -------------------- //
    Route::get('/admin/login', fn() => view('presmaboard.login'))->name('presmaboard.login');
    Route::post('/admin/login', [PresmaboardController::class, 'login'])->name('presmaboard.login.submit');

    // -------------------- ADMIN AREA -------------------- //
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', [PresmaboardController::class, 'dashboard'])->name('presmaboard.dashboard');
        Route::get('/leaderboard', [PresmaboardController::class, 'leaderboard'])->name('presmaboard.leaderboard');
        Route::get('/project', [PresmaboardController::class, 'project'])->name('presmaboard.project');
        Route::get('/prestasi', [PresmaboardController::class, 'prestasi'])->name('presmaboard.prestasi');
        Route::get('/nilai-pkp', [PresmaboardController::class, 'nilai_pkp'])->name('presmaboard.nilai_pkp');
        Route::post('/logout', [PresmaboardController::class, 'logout'])->name('presmaboard.logout');

        // CRUD Siswa
        Route::prefix('siswa')->name('presmaboard.siswa.')->group(function () {
            Route::get('/', [PresmaboardStudentController::class, 'index'])->name('index');
            Route::post('/', [PresmaboardStudentController::class, 'store'])->name('store');
            Route::get('/{id}', [PresmaboardStudentController::class, 'show'])->name('show');
            Route::put('/{id}', [PresmaboardStudentController::class, 'update'])->name('update');
            Route::delete('/{id}', [PresmaboardStudentController::class, 'destroy'])->name('destroy');
            Route::get('/statistics', [PresmaboardStudentController::class, 'getStatistics'])->name('statistics');
        });
    });
});


// ============================================================ //
// ========================== SIAKAD =========================== //
// ============================================================ //

Route::prefix('siakad')->name('siakad.')->group(function () {

    // -------------------- AUTH -------------------- //
    Route::get('/login', [SiakadAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [SiakadAuthController::class, 'login'])->name('login.submit');
    Route::get('/logout', [SiakadAuthController::class, 'logout'])->name('logout');

    // -------------------- HALAMAN LOGIN VIEW -------------------- //
    Route::view('/auth/login', 'siakad.auth.siakad-login');

    // -------------------- HALAMAN DASHBOARD -------------------- //
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // -------------------- ROUTE DENGAN AUTH -------------------- //
    Route::middleware('auth:siakad')->group(function () {

        // Majors
        Route::resource('majors', MajorController::class)->except(['create', 'edit']);

        // Classes
        Route::resource('classes', ClassesController::class)->except(['create', 'edit']);

        // Teachers
        Route::resource('teachers', TeacherController::class)->except(['create', 'edit']);

        // Students
        Route::resource('students', StudentController::class)->except(['create', 'edit']);

        // Subjects
        Route::resource('subjects', SubjectController::class)->except(['create', 'edit']);

        // Enrollments
        Route::resource('enrollments', EnrollmentsController::class)->except(['create', 'edit']);

        // Scores
        Route::resource('scores', ScoreController::class)->except(['create', 'edit']);

        // Absence
        Route::resource('absence', AbsenceController::class)->except(['create', 'edit']);

        // Users (Siakad Auth Management)
        Route::resource('users', SiakadAuthController::class)->except(['create', 'edit']);

        // Announcements
        Route::resource('announcements', AnnouncementController::class)->except(['create', 'edit']);

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    });
});
