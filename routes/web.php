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
    Route::get('/staffmanagement', [StaffController::class, 'index'])->name('staff');
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
    Route::view('/mikrotik-academy', 'mikrotik')->name('mikrotik');
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

    // === PASSWORD ===
    Route::get('/password/edit', [AdminPasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/update', [AdminPasswordController::class, 'update'])->name('password.update');


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

    // === TESTIMONI ===
    Route::prefix('testimoni')->name('testimoni.')->controller(AdminTestimoniController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === EKSTRAKURIKULER ===
    Route::prefix('ekstrakurikuler')->name('ekstrakurikuler.')->controller(AdminEkstrakurikulerController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === KARYA ===
    Route::prefix('karya')->name('karya.')->controller(AdminKaryaProyekController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === CONTACT / INBOX ===
    Route::prefix('contact')->name('contact.')->controller(AdminContactController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/bulk-mark-read', 'bulkMarkAsRead')->name('bulk-mark-read');
        Route::post('/bulk-delete', 'bulkDelete')->name('bulk-delete');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}/mark-read', 'markAsRead')->name('mark-read');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // === ACTIVITY LOGS ===
    Route::prefix('logs')->name('logs.')->controller(AdminLogController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/clear', 'clear')->name('clear');
    });

    // === NOTIFICATIONS ===
    Route::prefix('notifications')->name('notifications.')->controller(AdminNotificationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/mark-all-read', 'markAllRead')->name('mark-all-read');
        Route::post('/{id}/mark-read', 'markRead')->name('mark-read');
    });

    // === SETTINGS ===
    Route::prefix('settings')->name('settings.')->controller(AdminSettingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/update', 'update')->name('update');
        Route::post('/init', 'init')->name('init');
    });

    // === BACKUP ===
    Route::prefix('backup')->name('backup.')->controller(AdminBackupController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
        Route::get('/download/{filename}', 'download')->name('download');
        Route::delete('/{filename}', 'destroy')->name('destroy');
    });

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
