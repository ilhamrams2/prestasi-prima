<?php

use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\PresmaboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Errorcontroller;
use App\Http\Controllers\Siakad\AbsenceController;
use App\Http\Controllers\siakad\AttendanceController;
use App\Http\Controllers\siakad\auth\AuthController as SiakadAuthController;
use App\Http\Controllers\Siakad\ClassesController;
use App\Http\Controllers\Siakad\DashboardController;
use App\Http\Controllers\siakad\EnrollmentsController;
use App\Http\Controllers\siakad\MajorController;
use App\Http\Controllers\Siakad\ScoreController;
use App\Http\Controllers\Siakad\StudentController;
use App\Http\Controllers\siakad\SubjectController;
use App\Http\Controllers\siakad\TeacherController;
use App\Http\Controllers\Siakad\AnnouncementController;


Route::resource('news', ContentManagementController::class);

Route::get('/splash/{screen}', [ContentManagementController::class, 'splashscreen'])
    ->where('screen', '[1-4]+')
    ->name('splash.screen');
Route::post('/logout', [ContentManagementController::class, 'logout'])->name('logout');

// Route untuk login splash (role opsional)
Route::get('/splash/login/{role?}', [ContentManagementController::class, 'splash'])
    ->name('splash.login');


Route::resource('news', ContentManagementController::class);

Route::get('/splash/{screen}', [ContentManagementController::class, 'splashscreen'])
    ->where('screen', '[1-4]+')
    ->name('splash.screen');
Route::post('/logout', [ContentManagementController::class, 'logout'])->name('logout');

// Route untuk login splash (role opsional)
Route::get('/splash/login/{role?}', [ContentManagementController::class, 'splash'])
    ->name('splash.login');

Route::get('/', function () {
    return view('prestasiprima.pages.landing');
});

Route::prefix('erorpage')->group(function () {
    Route::get('/notinternet', function () {
        return view('prestasiprima.pages.erorpage.notinternet');
    });

    Route::get('/notfound', function () {
        return view('prestasiprima.pages.erorpage.notfound');
    });
});

Route::get('/gallery', [ContentManagementController::class, 'gallery'])->name('gallery.index');


Route::prefix('presmaboard')->group(function () {
    Route::get('/eligible', [PresmaboardController::class, 'Eligible_profile'])->name('eligible');
    Route::get('/leaderboard', [PresmaboardController::class, 'leaderboard'])->name('leaderboard');
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
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');

// ================= SIAKAD =================
Route::prefix('siakad')->name('siakad.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});

// Route::view('/siakad/login', 'siakad.auth.login')->name('siakad.login');
Route::get('/siakad/login', function () {
    return view('siakad.auth.siakad-login');
});

// siakad new routes
Route::prefix('siakad')->group(function () {
    // Auth routes
    Route::get('/login', [SiakadAuthController::class, 'showLogin'])->name('siakad.login');
    Route::post('/login', [SiakadAuthController::class, 'login'])->name('siakad.login.submit');
    Route::get('/logout', [SiakadAuthController::class, 'logout'])->name('siakad.logout');

    // Routes yang butuh login
    Route::middleware('auth:siakad')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('siakad.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('majors')->as('majors.')->group(function () {
            Route::get('/', [MajorController::class, 'index'])->name('index');
            Route::post('/', [MajorController::class, 'store'])->name('store');
            Route::put('/{id}', [MajorController::class, 'update'])->name('update');
            Route::delete('/{id}', [MajorController::class, 'destroy'])->name('destroy');
        });

        // Classes
        Route::prefix('classes')->as('classes.')->group(function () {
            Route::get('/', [ClassesController::class, 'index'])->name('index');
            Route::post('/', [ClassesController::class, 'store'])->name('store');
            Route::put('/{id}', [ClassesController::class, 'update'])->name('update');
            Route::delete('/{id}', [ClassesController::class, 'destroy'])->name('destroy');
        });

        // Classes
        Route::prefix('teacher')->as('teacher.')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('index');
            Route::post('/', [TeacherController::class, 'store'])->name('store');
            Route::put('/{id}', [TeacherController::class, 'update'])->name('siakad.teacher.update');
            Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
            Route::get('/{id}', [TeacherController::class, 'show']);
        });

        Route::prefix('students')->as('students.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::post('/', [StudentController::class, 'store'])->name('store');
            Route::put('/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('siakad')->as('siakad.')->group(function () {
            Route::prefix('teacher')->as('teacher.')->group(function () {
                Route::get('/', [TeacherController::class, 'index'])->name('index');
                Route::post('/', [TeacherController::class, 'store'])->name('store');

                // pastikan ini sebelum destroy
                Route::get('/teacher/{id}', [TeacherController::class, 'show']);


        Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
        Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
    });
});









        // Classes
        Route::prefix('subjects')->as('subjects.')->group(function () {
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::post('/', [SubjectController::class, 'store'])->name('store');
            Route::put('/{id}', [SubjectController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubjectController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('enrollments')->as('enrollments.')->group(function () {
            Route::get('/', [EnrollmentsController::class, 'index'])->name('index');
            Route::post('/', [EnrollmentsController::class, 'store'])->name('store');
            Route::put('/{id}', [EnrollmentsController::class, 'update'])->name('update');
            Route::delete('/{id}', [EnrollmentsController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('scores')->as('scores.')->group(function () {
            Route::get('/', [ScoreController::class, 'index'])->name('index');
            Route::post('/', [ScoreController::class, 'store'])->name('store');
            Route::put('/{id}', [ScoreController::class, 'update'])->name('update');
            Route::delete('/{id}', [ScoreController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('absence')->as('absence.')->group(function () {
            Route::get('/', [AbsenceController::class, 'index'])->name('index');
            Route::post('/', [AbsenceController::class, 'store'])->name('store');
            Route::put('/{id}', [AbsenceController::class, 'update'])->name('update');
            Route::delete('/{id}', [AbsenceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', [SiakadAuthController::class, 'index'])->name('index');
            Route::post('/', [SiakadAuthController::class, 'store'])->name('store');
            Route::put('/{id}', [SiakadAuthController::class, 'update'])->name('update');
            Route::delete('/{id}', [SiakadAuthController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('announcements')->as('announcements.')->group(function () {
            Route::get('/', [AnnouncementController::class, 'index'])->name('index');   // list semua pengumuman
            Route::post('/', [AnnouncementController::class, 'store'])->name('store');  // tambah pengumuman
            Route::get('/{id}', [AnnouncementController::class, 'show'])->name('show'); // detail pengumuman
            Route::put('/{id}', [AnnouncementController::class, 'update'])->name('update'); // update pengumuman
            Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('destroy'); // hapus pengumuman
        });
    });
});