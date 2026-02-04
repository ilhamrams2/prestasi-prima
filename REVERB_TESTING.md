# 🧪 Guide Testing Laravel Reverb (Step-by-Step)

Ikuti langkah-langkah di bawah ini untuk memastikan WebSocket Reverb berjalan sempurna sampai muncul notifikasi realtime.

---

### 1. Persiapan Terminal
Buka **3 terminal** terpisah di folder project:

*   **Terminal 1 (Reverb Server):**
    ```bash
    php artisan reverb:start --debug
    ```
    *(Flag `--debug` membantu kita melihat traffic masuk/keluar)*

*   **Terminal 2 (Vite Assets):**
    ```bash
    npm run dev
    ```

*   **Terminal 3 (Laravel App):**
    ```bash
    php artisan serve
    ```

---

### 2. Monitoring Browser
1.  Buka browser dan login ke **Admin Dashboard** (`http://localhost:8000/prestasiprima/admin/login`).
2.  Buka **Inspect Element (F12)** -> Tab **Console**.
3.  Pastikan tidak ada error merah. Jika tertulis `Echo listening on admin-activity`, berarti koneksi WebSocket BERHASIL.
4.  Cek tab **Network** -> Filter **WS**. Refresh halaman. Anda harus melihat koneksi ke `localhost:8080` dengan status `101 Switching Protocols`.

---

### 3. Simulasi Event Realtime
Kita akan menggunakan **Laravel Tinker** untuk memicu event seolah-olah ada aktivitas admin.

1.  Buka **Terminal ke-4** (atau gunakan terminal yang sedang nganggur).
2.  Jalankan Tinker:
    ```bash
    php artisan tinker
    ```
3.  Copy dan Paste perintah ini di dalam Tinker:
    ```php
    use App\Models\prestasiprima\ActivityLog;
    use App\Events\ActivityLogged;

    // Buat log dummy
    $log = ActivityLog::create([
        'user_id' => 1,
        'user_name' => 'Tester Reverb',
        'action' => 'TEST',
        'description' => 'Mencoba WebSocket Reverb - ' . now()->format('H:i:s'),
        'ip_address' => '127.0.0.1',
    ]);

    // Broadcast event
    broadcast(new ActivityLogged($log));
    ```

---

### 4. Hasil yang Diharapkan
1.  **Di Terminal Reverb:** Akan muncul log bertuliskan `Message received: {"event":"pusher:subscribe", ...}` dan `Message sent...`.
2.  **Di Browser (Dashboard Admin):**
    *   Muncul **Toast Notification** di pojok kanan atas berisi pesan dummy tadi.
    *   Angka di **Icon Lonceng (Notification Badge)** akan bertambah otomatis.
    *   Jika lonceng diklik, data dummy tadi muncul di list teratas tanpa reload halaman.

---

### 5. Troubleshooting (Jika Gagal)
*   **Port 8080 bentrok?** Ubah `REVERB_PORT` di `.env` jadi `8081` lalu restart server.
*   **Vite tidak update?** Cek `.env`, pastikan `VITE_REVERB_APP_KEY` sama dengan `REVERB_APP_KEY`.
*   **Reverb Error?** Pastikan ekstensi PHP `pcntl` dan `posix` terinstall (untuk Linux), atau running di Windows via Laragon/XAMPP sudah OK.
