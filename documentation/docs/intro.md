---
sidebar_position: 1
---

# Portal SMK Prestasi Prima

Selamat datang di dokumentasi resmi **Portal SMK Prestasi Prima**. Portal ini adalah sistem manajemen terpadu yang mengelola website sekolah, dashboard siswa, dan panel administrasi.

## Gambaran Umum

Portal ini dibangun menggunakan:
- **Laravel 10.x** - Framework backend utama
- **Vite** - Asset bundling & HMR
- **Tailwind CSS** - Styling
- **Alpine.js** - Interaktivitas ringan
- **Laravel Reverb** - WebSocket untuk fitur real-time

## Modul Utama

### 1. Website Publik (Prestasi Prima)
Website sekolah yang menampilkan:
- Profil sekolah, visi & misi
- Berita & informasi terkini
- Galeri foto & video
- Sistem pendaftaran siswa baru (SPMB)
- Virtual Tour 360°
- Program MikroTik Academy

### 2. AdminPP
Panel administrasi terpusat:
- Manajemen konten (berita, galeri)
- Manajemen user & staff
- PresmaCare (sistem helpdesk)
- Analytics & monitoring
- Manajemen data siswa

## Quick Start

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

# Run development servers
php artisan serve          # Terminal 1
npm run dev               # Terminal 2
php artisan reverb:start  # Terminal 3
```

Akses aplikasi di `http://localhost:8000`

## Navigasi Dokumentasi

- **Panduan Penggunaan Admin** - Panduan operasional untuk pengelola.
- **API Reference** - Dokumentasi lengkap REST API.
- **Arsitektur** - Struktur dan design pattern.
- **Deployment** - Panduan production deployment.
- **Contributing** - Guidelines untuk kontributor.
