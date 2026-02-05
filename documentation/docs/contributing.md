---
sidebar_position: 6
---

# Panduan Kontribusi

Terima kasih telah tertarik untuk berkontribusi pada pengembangan Portal SMK Prestasi Prima.

## Standar Pengembangan

### 1. Workflow Git
- Gunakan branch `feature/nama-fitur` untuk fitur baru.
- Gunakan branch `fix/nama-bug` untuk perbaikan bug.
- Selalu lakukan `pull` terbaru dari branch `main` sebelum memulai pekerjaan.
- Tulis pesan commit yang deskriptif dalam Bahasa Indonesia atau Inggris yang baku.

### 2. Standar Kode PHP (Laravel)
- Ikuti standar PSR-12.
- Gunakan Type Hinting pada fungsi dan return value jika memungkinkan.
- Logika bisnis yang kompleks harus diletakkan di dalam **Services**, bukan langsung di Controller.
- Gunakan **Eloquent ORM** untuk interaksi dengan database.

### 3. Standar Frontend
- Gunakan **Tailwind CSS** untuk styling. Hindari menulis CSS inline yang terlalu panjang.
- Gunakan **RemixIcon** sebagai standar icon di seluruh aplikasi.
- Pastikan tampilan responsif di perangkat mobile dan desktop.

## Cara Melakukan Kontribusi

1. **Fork/Clone** repository ke lokal Anda.
2. Buat branch baru dari `main`.
3. Lakukan perubahan kode.
4. Pastikan aplikasi berjalan normal dengan menjalankan server lokal.
5. Jalankan `npm run build` untuk memastikan tidak ada error pada asset.
6. Push branch Anda ke repository remote.
7. Buat **Pull Request** (PR) dengan deskripsi perubahan yang jelas.

## Menulis Dokumentasi

Jika Anda menambah fitur baru atau mengubah alur sistem, Anda WAJIB memperbarui dokumentasi:
- **API**: Tambahkan/ubah anotasi OpenAPI di controller terkait, lalu jalankan `php artisan l5-swagger:generate`.
- **Sistem**: Tambahkan panduan di folder `documentation/docs` menggunakan format Markdown.

## Kontak Tim Pengembang

Jika ada pertanyaan lebih lanjut mengenai struktur kode atau kendala teknis, silakan hubungi tim IT SMK Prestasi Prima melalui email di: `it@prestasiprima.sch.id`.
