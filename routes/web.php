<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Response;
// ============================================================
// ===================== IMPORT CONTROLLERS ===================
// ============================================================

use App\Http\Controllers\{
    ChatbotController,
    Pendaftaran,
    FormulirController
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
    AdminTestimoniController,
    AdminEkstrakurikulerController,
    AdminKaryaProyekController,
    AdminPasswordController,
    AdminContactController,
    AdminLogController,
    AdminNotificationController,
    AdminSettingController,
    AdminBackupController,
    AdminUserController,
    AdminMikrotikTrainerController,
    AdminHeroController,
    AdminLulusanPtnController,
    AuthPPController
};


// ============================================================
// ======================= HALAMAN UTAMA ======================
// ============================================================


Route::get('/', [HomepageController::class, 'index'])->name('landing');

Route::view('/welcome', 'welcome')->name('welcome');
Route::view('/virtual-tour', 'Tour.VirtualTour')->name('virtual-tour');

// Chatbot
// Route::post('/send', [ChatbotController::class, 'send'])->name('chatbot.send');

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
    Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan');
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
});


// ==================== SISWA ==================== //
Route::prefix('siswa')->group(function () {
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('prestasiprima.ekstrakurikuler');
    Route::get('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'show'])->name('prestasiprima.ekstrakurikuler.show');
    Route::get('/karya-proyek', [KaryaProyekController::class, 'index'])->name('karya-proyek');
    Route::get('/karya-proyek/{id}', [KaryaProyekController::class, 'show'])->name('karya-proyek.show');
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
    Route::get('/mikrotik-academy', [\App\Http\Controllers\prestasiprima\MikrotikAcademyController::class, 'index'])->name('mikrotik');
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

// Route::controller(FormulirController::class)->group(function () {
//     Route::get('/formulir', 'create')->name('pendaftaran.formulir');
//     Route::post('/formulir', 'store')->name('pendaftaran.formulir.store');
//     Route::get('/validasi', 'validasi')->name('pendaftaran.validasi');
// });


// ============================================================
// ==================== AUTH & ADMIN LOGIN ====================
// ============================================================

// Clean Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthPPController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AuthPPController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AuthPPController::class, 'logout'])->name('admin.logout');
});

// Standard & Legacy Aliases / Redirects
Route::redirect('/login', '/admin/login');
Route::redirect('/authPP', '/admin/login');
Route::redirect('/authPP/login', '/admin/login');
Route::match(['get', 'post'], '/authPP/logout', [AuthPPController::class, 'logout'])->name('authPP.logout');
Route::get('/authPP/login-legacy', [AuthPPController::class, 'showLoginForm'])->name('authPP.login');
Route::post('/authPP/login-legacy-post', [AuthPPController::class, 'login'])->name('authPP.login.post');

// Admin Root Redirect
Route::get('/admin', function () {
    return auth('authPP')->check()
        ? redirect()->route('prestasiprima.admin.dashboard')
        : redirect()->route('admin.login');
})->name('admin');

// Backward compatibility redirects for legacy /prestasiprima/admin paths
Route::redirect('/prestasiprima/admin', '/admin');
Route::redirect('/prestasiprima/admin/{any}', '/admin/{any}')->where('any', '.*');

// ============================================================
// ================ PRESTASIPRIMA ADMIN PANEL =================
// ============================================================

Route::middleware(['authPP'])->prefix('admin')->name('prestasiprima.admin.')->group(function () {

    // === DEBUG ROUTE (TEMPORARY) ===
    Route::get('/debug-user', function() {
        $user = auth('authPP')->user();
        return response()->json([
            'authenticated' => auth('authPP')->check(),
            'user' => $user,
            'role' => $user->role ?? null,
            'status' => $user->status ?? null,
            'is_super_admin' => $user->isSuperAdmin() ?? null,
        ]);
    })->name('debug.user');

    // === TEST ROUTE (TEMPORARY) - No role middleware ===
    Route::get('/test-berita-create', function() {
        return 'TEST: Anda bisa akses route ini! User: ' . auth('authPP')->user()->name;
    })->name('test.berita');

    // === DASHBOARD (All Roles) ===
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // === PASSWORD (All Roles) ===
    Route::get('/password/edit', [AdminPasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/update', [AdminPasswordController::class, 'update'])->name('password.update');

    // === USER MANAGEMENT (Super Admin Only) ===
    Route::middleware(['role:super_admin'])->prefix('users')->name('users.')->controller(AdminUserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === SETTINGS & BACKUP (Super Admin Only) ===
    Route::middleware(['role:super_admin'])->group(function () {
        // Settings
        Route::prefix('settings')->name('settings.')->controller(AdminSettingController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::patch('/update', 'update')->name('update');
            Route::post('/init', 'init')->name('init');
        });

        // Backup
        Route::prefix('backup')->name('backup.')->controller(AdminBackupController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/create', 'create')->name('create');
            Route::get('/download/{filename}', 'download')->name('download');
            Route::delete('/{filename}', 'destroy')->name('destroy');
        });

        // Logs
        Route::prefix('logs')->name('logs.')->controller(AdminLogController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/clear', 'clear')->name('clear');
        });
    });

    // === CONTENT MANAGEMENT (Super Admin, Editor, Moderator, Viewer) ===
    Route::middleware(['role:super_admin,editor,moderator,viewer'])->group(function () {
        // Read-only access for most content sections
        Route::get('/gallery', [AdminGalleryController::class, 'index'])->name('gallery.index');
        Route::get('/berita', [AdminNewsController::class, 'index'])->name('berita.index');
        // NOTE: berita/{id} moved below to avoid conflict with berita/create
        Route::get('/prestasi', [AdminPrestasiController::class, 'index'])->name('prestasi.index');
        // prestasi/{id} moved below to avoid conflict with prestasi/create
        Route::get('/kegiatan', [AdminKegiatanController::class, 'index'])->name('kegiatan.index');
        Route::get('/industri', [AdminIndustriController::class, 'index'])->name('industri.index');
        Route::get('/staff', [AdminStaffController::class, 'index'])->name('staff.index');
        // staff/{staff} moved below to avoid conflict with staff/create
        Route::get('/testimoni', [AdminTestimoniController::class, 'index'])->name('testimoni.index');
        Route::get('/ekstrakurikuler', [AdminEkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
        Route::get('/karya', [AdminKaryaProyekController::class, 'index'])->name('karya.index');
        Route::get('/hero', [AdminHeroController::class, 'index'])->name('hero.index');
        Route::get('/lulusan-ptn', [AdminLulusanPtnController::class, 'index'])->name('lulusan-ptn.index');
    });

    // === CONTENT EDITING (Super Admin, Editor) ===
    Route::middleware(['role:super_admin,editor'])->group(function () {
        // Hero Video Section
        Route::prefix('hero')->name('hero.')->controller(AdminHeroController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::patch('/{id}/set-active', 'setActive')->name('set-active');
        });

        // Gallery
        Route::prefix('gallery')->name('gallery.')->controller(AdminGalleryController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Berita
        Route::prefix('berita')->name('berita.')->controller(AdminNewsController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/{id}', 'show')->name('show'); // Moved here after /create
        });

        // Prestasi
        Route::prefix('prestasi')->name('prestasi.')->controller(AdminPrestasiController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Kegiatan
        Route::prefix('kegiatan')->name('kegiatan.')->controller(AdminKegiatanController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Industri
        Route::prefix('industri')->name('industri.')->controller(AdminIndustriController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{industri}/edit', 'edit')->name('edit');
            Route::put('/{industri}', 'update')->name('update');
            Route::delete('/{industri}', 'destroy')->name('destroy');
        });

        // Staff
        Route::prefix('staff')->name('staff.')->controller(AdminStaffController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{staff}/edit', 'edit')->name('edit');
            Route::put('/{staff}', 'update')->name('update');
            Route::delete('/{staff}', 'destroy')->name('destroy');
        });



        // Testimoni
        Route::prefix('testimoni')->name('testimoni.')->controller(AdminTestimoniController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Ekstrakurikuler
        Route::prefix('ekstrakurikuler')->name('ekstrakurikuler.')->controller(AdminEkstrakurikulerController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Karya
        Route::prefix('karya')->name('karya.')->controller(AdminKaryaProyekController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Mikrotik Academy
        Route::prefix('mikrotik')->name('mikrotik.')->controller(AdminMikrotikTrainerController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{trainer}/edit', 'edit')->name('edit');
            Route::put('/{trainer}', 'update')->name('update');
            Route::delete('/{trainer}', 'destroy')->name('destroy');
        });

        // Lulusan PTN
        Route::prefix('lulusan-ptn')->name('lulusan-ptn.')->controller(AdminLulusanPtnController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::patch('/{id}/toggle-status', 'toggleStatus')->name('toggle-status');
        });
    });

    // === MODERATION / INBOX (Super Admin, Moderator) ===
    Route::middleware(['role:super_admin,moderator'])->group(function () {
        // Contact / Inbox
        Route::prefix('contact')->name('contact.')->controller(AdminContactController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/bulk-mark-read', 'bulkMarkAsRead')->name('bulk-mark-read');
            Route::post('/bulk-delete', 'bulkDelete')->name('bulk-delete');
            Route::get('/{id}', 'show')->name('show');
            Route::post('/{id}/mark-read', 'markAsRead')->name('mark-read');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        // Notifications
        Route::prefix('notifications')->name('notifications.')->controller(AdminNotificationController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/mark-all-read', 'markAllRead')->name('mark-all-read');
            Route::post('/{id}/mark-read', 'markRead')->name('mark-read');
        });

        // Admin Chat
        Route::prefix('chat')->name('chat.')->controller(\App\Http\Controllers\prestasiprima\AdminChatController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });
    });

    // === WILDCARD ROUTES (Must be at the end to avoid blocking /create, etc) ===
    Route::get('/staff/{staff}', [AdminStaffController::class, 'show'])->name('staff.show');
    Route::get('/berita/{id}', [AdminNewsController::class, 'show'])->name('berita.show');
    Route::get('/prestasi/{id}', [AdminPrestasiController::class, 'show'])->name('prestasi.show');

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
