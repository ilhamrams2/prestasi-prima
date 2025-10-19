<?php

use Illuminate\Support\Facades\Route;

// ============================================================
// ================ IMPORT CONTROLLERS ========================
// ============================================================

use App\Http\Controllers\{
    Pendaftaran,
    FormulirController,
    SocialAuthController
};

use App\Http\Controllers\Prestasiprima\{
    GalleryController,
    NewsController,
    SambutanController
};

use App\Http\Controllers\Prestasiprima\Admin\{
    AdminNewsController,
    AdminGalleryController
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
// ======================== HALAMAN UTAMA =====================
// ============================================================

Route::view('/', 'prestasiprima.pages.landing');
Route::view('/welcome', 'welcome')->name('welcome');


// ============================================================
// ===================== PRESTASIPRIMA ========================
// ============================================================

// ---------- Sambutan ----------
Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');

// ---------- Pendaftaran ----------
Route::controller(Pendaftaran::class)->group(function () {
    Route::get('/pendaftaran', 'index')->name('pendaftaran');
});

Route::controller(FormulirController::class)->group(function () {
    Route::get('/formulir', 'create')->name('pendaftaran.formulir');
    Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
    Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
});

// ---------- Auth Sosial ----------
Route::controller(SocialAuthController::class)
    ->prefix('auth')
    ->name('social.')
    ->group(function () {
        Route::get('{provider}', 'redirect')->name('redirect');
        Route::get('{provider}/callback', 'callback')->name('callback');
    });

// ---------- Galeri ----------
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// ---------- Berita ----------
Route::prefix('berita')
    ->name('berita.')
    ->controller(NewsController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/kategori/{slug}', 'category')->name('kategori');
        Route::get('/{slug}', 'show')->name('detail');
    });


// ============================================================
// ======================= PRESMABOARD ========================
// ============================================================

Route::prefix('presmaboard')->name('presmaboard')->group(function () {

    // Dashboard & Home
    Route::get('/', [PresmaboardController::class, 'index'])->name('.index');

    // ---------- Auth ----------
    Route::get('/login', [PresmaboardAuthController::class, 'index'])->name('.login');
    Route::post('/login', [PresmaboardAuthController::class, 'authenticate'])->name('.authenticate');
    Route::get('/logout', [PresmaboardAuthController::class, 'logout'])->name('.logout');

    // ---------- Admin Area ----------
    Route::prefix('admin')->name('.admin')->group(function () {

        // Dashboard
        Route::get('/', [PresmaboardDashboardController::class, 'index'])->name('.dashboard');
        Route::get('/leaderboard', [PresmaboardLeaderboardController::class, 'index'])->name('.leaderboard');

        // Project
        Route::prefix('project')
            ->name('.project')
            ->controller(PresmaboardProjectController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{project}', 'update')->name('.update');
                Route::delete('/{project}', 'destroy')->name('.destroy');
            });

        // Student
        Route::prefix('student')
            ->name('.student')
            ->controller(PresmaboardStudentController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{student}', 'update')->name('.update');
                Route::delete('/{student}', 'destroy')->name('.destroy');
            });

        // Achievement
        Route::prefix('achievement')
            ->name('.achievement')
            ->controller(PresmaboardAchievementController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{achievement}', 'update')->name('.update');
                Route::delete('/{achievement}', 'destroy')->name('.destroy');
            });

        // Score
        Route::prefix('score')
            ->name('.score')
            ->controller(PresmaboardScoreController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/', 'store')->name('.store');
                Route::put('/{score}', 'update')->name('.update');
                Route::delete('/{score}', 'destroy')->name('.destroy');
            });
    });
});


// ============================================================
// ================== PRESTASIPRIMA ADMIN ======================
// ============================================================

Route::prefix('prestasiprima/admin')
    ->name('prestasiprima.admin.')
    ->group(function () {

        // ---------- Gallery ----------
        Route::prefix('gallery')
            ->name('gallery.')
            ->controller(AdminGalleryController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        // ---------- Berita ----------
        Route::prefix('berita')
            ->name('berita.')
            ->controller(AdminNewsController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });

Route::get('/notinternet', function () {
    return view('errors.notinternet');
})->name('notinternet');


    // Fallback jika route tidak ditemukan (404)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
