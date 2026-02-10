# Panduan Konfigurasi Upload File Admin Panel

Untuk mendukung fitur upload file besar (Foto 15MB, Dokumen 20MB, Video/Zip 100MB) yang baru saja dikonfigurasi di sistem Admin Panel, Anda **WAJIB** melakukan penyesuaian pada konfigurasi server PHP Anda. Tanpa perubahan ini, upload file besar akan gagal meskipun aplikasi sudah mengizinkannya.

## 1. Konfigurasi `php.ini`

Cari file `php.ini` yang digunakan oleh server Anda (biasanya di `C:\laragon\bin\php\php-x.x.x\php.ini`) dan ubah nilai berikut:

```ini
; Maksimal ukuran file upload (disarankan 120MB untuk cover 100MB video)
upload_max_filesize = 120M

; Maksimal ukuran total data POST (harus >= upload_max_filesize)
post_max_size = 120M

; Batas waktu eksekusi (penting untuk upload file besar atau konversi gambar)
max_execution_time = 300
max_input_time = 300

; Memory Limit (penting untuk proses resize/convert gambar resolusi tinggi)
memory_limit = 512M
```

> **Catatan:** Setelah mengubah file `php.ini`, Anda harus **merestart server web** (Apache/Nginx/Laragon) agar perubahan berlaku.

## 2. Fitur Baru Sistem

### A. Otomatisasi Gambar (WebP & Kompresi)
Sistem kini menggunakan `MediaService` yang telah diperbarui untuk:
1.  **Mendeteksi Gambar**: Jika file adalah gambar (JPG/PNG), sistem otomatis:
    - Mengkonversi format ke **WebP** (format modern, ringan, kualitas tinggi).
    - Melakukan **Resize** proporsional (max width 1200px).
    - Mengkompresi kualitas ke 80% (tanpa merusak visual).
2.  **File Dokumen/Video**: Jika file adalah dokumen (PDF/Docx) atau Video, sistem akan menyimpannya secara langsung tanpa konversi, menjaga keaslian file.

### B. Batasan Ukuran (Validation)
Semua modul admin utama (Berita, Galeri, Prestasi, dll) telah diperbarui limit validasinya menjadi:
- **Gambar**: Maksimal 15 MB.
- **Dokumen/Video**: Kode sistem mendukung hingga 100 MB (via `MediaService`), namun pastikan validasi spesifik di Controller (jika ada input khusus dokumen) disesuaikan jika ingin mengupload dokumen > 15MB. Saat ini validasi gambar utama diset ke 15MB.

## 3. troubleshooting
Jika Anda menemui error `413 Payload Too Large` atau halaman reload saat upload:
- Periksa kembali setting `upload_max_filesize` di `php.ini`.
- Pastikan konfigurasi Nginx (jika pakai Nginx) `client_max_body_size 120M;`.
- Pastikan `post_max_size` lebih besar dari file yang diupload.
