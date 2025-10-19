<?php

use App\Http\Controllers\ContentManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\Pendaftaran;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PresmalanceController;
use App\Http\Controllers\PresmaAuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Errorcontroller;
use App\Http\Controllers\presmaboard\AchievementController as PresmaboardAchievementController;
use App\Http\Controllers\presmaboard\PresmaboardController;
use App\Http\Controllers\presmaboard\AuthController as PresmaboardAuthController;
use App\Http\Controllers\presmaboard\DashboardController as PresmaboardDashboardController;
use App\Http\Controllers\presmaboard\LeaderboardController as PresmaboardLeaderboardController;
use App\Http\Controllers\presmaboard\StudentController as PresmaboardStudentController;
use App\Http\Controllers\presmaboard\ProjectController as PresmaboardProjectController;
use App\Http\Controllers\presmaboard\ScoreController as PresmaboardScoreController;
use App\Http\Controllers\prestasiprima\SambutanController as PrestasiprimaSambutanController;
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
use App\Http\Controllers\Siakad\ProfileController;


// ================= CONTENT MANAGEMENT ================= //
Route::resource('news', ContentManagementController::class);

Route::get('/splash/{screen}', [ContentManagementController::class, 'splashscreen'])
    ->where('screen', '[1-4]+')
    ->name('splash.screen');

Route::post('/logout', [ContentManagementController::class, 'logout'])->name('logout');

Route::get('/splash/login/{role?}', [ContentManagementController::class, 'splash'])
    ->name('splash.login');

Route::get('/', fn() => view('prestasiprima.pages.landing'));

Route::prefix('erorpage')->group(function () {
    Route::get('/notinternet', fn() => view('prestasiprima.pages.erorpage.notinternet'));
    Route::get('/notfound', fn() => view('prestasiprima.pages.erorpage.notfound'));
});

Route::get('/gallery', [ContentManagementController::class, 'gallery'])->name('gallery.index');


// ============================================================ //
// ======================== PRESMABOARD ======================== //
// ============================================================ //
Route::prefix('presmaboard')->name('presmaboard')->group(function () {

    // Dashboard | Leaderboard
    Route::get('/', [PresmaboardController::class, 'index'])->name('.index');

    // Auth
    Route::get('/login', [PresmaboardAuthController::class, 'index'])->name('.login');
    Route::post('/login', [PresmaboardAuthController::class, 'authenticate'])->name('.authenticate');
    Route::get('/logout', [PresmaboardAuthController::class, 'logout'])->name('.logout');


    // -------------------- ADMIN AREA -------------------- //
    Route::prefix('admin')->name('.admin')->group(function () {

        // 
        Route::get('/', [PresmaboardDashboardController::class, 'index'])->name('.dashboard');
        Route::get('/leaderboard', [PresmaboardLeaderboardController::class, 'index'])->name('.leaderboard');

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
                // Route::get('/{id}', 'show')->name('.show');
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


// ================= PRESTASI PRIMA ================= //
Route::get('/welcome', fn() => view('welcome'));
Route::get('/sambutan', [PrestasiprimaSambutanController::class, 'index'])->name('sambutan');
Route::get('/pendaftaran', [Pendaftaran::class, 'index'])->name('pendaftaran');
Route::get('/formulir', [FormulirController::class, 'create'])->name('pendaftaran.formulir');
Route::post('/formulir', [FormulirController::class, 'store'])->name('pendaftaran.formulir.store');
Route::get('/validasi', [FormulirController::class, 'validasi'])->name('pendaftaran.validasi');
Route::get('/presmalance', [PresmalanceController::class, 'presmalance'])->name('presmalancer.presmalance');
Route::get('/login', [PresmalanceController::class, 'login'])->name('login');
Route::post('/login', [PresmaAuthController::class, 'login'])->name('login.post');

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');
Route::get('/forum', [PresmalanceController::class, 'forum'])->name('forum');


// ============================================================ //
// =========================== SIAKAD ========================= //
// ============================================================ //
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

        // Majors
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

        // Teachers
        Route::prefix('teacher')->as('teacher.')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('index');
            Route::post('/', [TeacherController::class, 'store'])->name('store');
            Route::get('/{id}', [TeacherController::class, 'show']);
            Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
            Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
        });

        // Students
        Route::prefix('students')->as('students.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::post('/', [StudentController::class, 'store'])->name('store');
            Route::put('/{id}', [StudentController::class, 'update'])->name('update');
            Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
        });

        // Subjects
        Route::prefix('subjects')->as('subjects.')->group(function () {
            Route::get('/', [SubjectController::class, 'index'])->name('index');
            Route::post('/', [SubjectController::class, 'store'])->name('store');
            Route::put('/{id}', [SubjectController::class, 'update'])->name('update');
            Route::delete('/{id}', [SubjectController::class, 'destroy'])->name('destroy');
        });

        // Enrollments
        Route::prefix('enrollments')->as('enrollments.')->group(function () {
            Route::get('/', [EnrollmentsController::class, 'index'])->name('index');
            Route::post('/', [EnrollmentsController::class, 'store'])->name('store');
            Route::put('/{id}', [EnrollmentsController::class, 'update'])->name('update');
            Route::delete('/{id}', [EnrollmentsController::class, 'destroy'])->name('destroy');
        });

        // Scores
        Route::prefix('scores')->as('scores.')->group(function () {
            Route::get('/', [ScoreController::class, 'index'])->name('index');
            Route::post('/', [ScoreController::class, 'store'])->name('store');
            Route::put('/{id}', [ScoreController::class, 'update'])->name('update');
            Route::delete('/{id}', [ScoreController::class, 'destroy'])->name('destroy');
        });

        // Absence
        Route::prefix('absence')->as('absence.')->group(function () {
            Route::get('/', [AbsenceController::class, 'index'])->name('index');
            Route::post('/', [AbsenceController::class, 'store'])->name('store');
            Route::put('/{id}', [AbsenceController::class, 'update'])->name('update');
            Route::delete('/{id}', [AbsenceController::class, 'destroy'])->name('destroy');
        });

        // Users
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', [SiakadAuthController::class, 'index'])->name('index');
            Route::post('/', [SiakadAuthController::class, 'store'])->name('store');
            Route::put('/{id}', [SiakadAuthController::class, 'update'])->name('update');
            Route::delete('/{id}', [SiakadAuthController::class, 'destroy'])->name('destroy');
        });

        // Announcements
        Route::prefix('announcements')->as('announcements.')->group(function () {
            Route::get('/', [AnnouncementController::class, 'index'])->name('index');
            Route::post('/', [AnnouncementController::class, 'store'])->name('store');
            Route::get('/{id}', [AnnouncementController::class, 'show'])->name('show');
            Route::put('/{id}', [AnnouncementController::class, 'update'])->name('update');
            Route::delete('/{id}', [AnnouncementController::class, 'destroy'])->name('destroy');
        });

        // Profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('siakad.profile');
    });
});
