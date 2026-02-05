---
sidebar_position: 5
---

# Panduan Penggunaan Admin

Panduan operasional untuk pengelola Portal SMK Prestasi Prima.

## Akses Admin Panel

Panel Admin dapat diakses melalui URL `/admin` (atau `/login` terlebih dahulu jika belum masuk). Hanya pengguna dengan peran `admin` atau `superadmin` yang dapat mengakses fitur-fitur ini.

## Manajemen Konten

### 1. Berita (News)
- **Menambah Berita**: Klik menu "Berita" > "Tambah Baru". Isi judul, kategori, konten, dan unggah gambar utama (thumbnail).
- **Edit/Hapus**: Gunakan tombol aksi pada tabel daftar berita.
- **Status**: Berita dapat diatur sebagai draf atau langsung diterbitkan.

### 2. Galeri
- **Kategori Galeri**: Foto atau Video.
- **Upload**: Pastikan ukuran file foto tidak terlalu besar untuk performa website (rekomendasi < 500KB).

### 3. Prestasi Siswa
- Digunakan untuk menampilkan pencapaian siswa di halaman depan.
- Masukkan nama siswa, nama lomba/prestasi, tingkat (nasional/internasional), dan bukti dokumentasi.

## Manajemen Sistem

### 1. Pengaturan User
- Pengelolaan akun staf dan admin.
- Pengaturan password secara berkala sangat disarankan.

### 2. PresmaCare (Bantuan)
- Sistem tiket untuk menangani keluhan atau pertanyaan dari siswa/wali murid.
- Admin dapat menjawab secara real-time melalui dashboard.

### 3. Pendaftaran Siswa Baru (SPMB)
- Memantau data calon siswa yang mendaftar melalui website.
- Export data ke Excel untuk keperluan verifikasi offline.

## Pemeliharaan Rutin

1. **Cek Log**: Sesekali periksa menu Log Sistem untuk melihat aktivitas mencurigakan.
2. **Backup**: Gunakan fitur backup (jika tersedia di panel) atau jalankan script backup database secara manual setiap minggu.
3. **Update API Docs**: Jika ada perubahan pada endpoint API, jangan lupa menjalankan `php artisan l5-swagger:generate` agar dokumentasi tetap akurat.

## Link Cepat Dokumentasi Eksternal

Di sidebar admin bagian bawah terdapat section **Eksternal**:
- **Dokumentasi API**: Untuk developer yang ingin integrasi.
- **Dokumentasi Sistem**: Link menuju halaman ini (Docusaurus).
- **Lihat Website Utama**: Shortcut untuk mengecek hasil update di halaman depan.
