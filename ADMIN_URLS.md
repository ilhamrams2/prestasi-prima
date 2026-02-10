# 🔐 Admin Panel - URL Reference

## ⚡ Quick Start (PENTING!)

### Langkah 1: Login Pertama Kali
1. **Buka halaman login:** http://localhost:8000/authPP/login
2. **Masukkan kredensial:**
   - Email: `admin@smkprestasiprima.sch.id`
   - Password: `password`
3. **Klik Login**
4. **Anda akan diarahkan ke Dashboard**

### Langkah 2: Akses Fitur Admin
Setelah login, Anda bisa akses semua URL admin di bawah ini.

**⚠️ CATATAN PENTING:**
- Anda HARUS login dulu sebelum bisa akses halaman admin
- Jika belum login dan akses URL admin, akan muncul error 404 atau redirect ke login
- Pastikan gunakan prefix `/prestasiprima/admin/` untuk semua URL admin

---

## Login
- **Login Page:** http://localhost:8000/authPP/login
  - Email: `admin@smkprestasiprima.sch.id`
  - Password: `password`

---

## 📊 Dashboard
- **Dashboard:** http://localhost:8000/prestasiprima/admin/dashboard

---

## 📝 Content Management (Super Admin & Editor)

### Berita (News)
- **List:** http://localhost:8000/prestasiprima/admin/berita
- **Create:** http://localhost:8000/prestasiprima/admin/berita/create
- **Edit:** http://localhost:8000/prestasiprima/admin/berita/{id}/edit
- **Show:** http://localhost:8000/prestasiprima/admin/berita/{id}

### Gallery
- **List:** http://localhost:8000/prestasiprima/admin/gallery
- **Create:** http://localhost:8000/prestasiprima/admin/gallery/create
- **Edit:** http://localhost:8000/prestasiprima/admin/gallery/{id}/edit

### Prestasi
- **List:** http://localhost:8000/prestasiprima/admin/prestasi
- **Create:** http://localhost:8000/prestasiprima/admin/prestasi/create
- **Edit:** http://localhost:8000/prestasiprima/admin/prestasi/{id}/edit
- **Show:** http://localhost:8000/prestasiprima/admin/prestasi/{id}

### Kegiatan
- **List:** http://localhost:8000/prestasiprima/admin/kegiatan
- **Create:** http://localhost:8000/prestasiprima/admin/kegiatan/create
- **Edit:** http://localhost:8000/prestasiprima/admin/kegiatan/{id}/edit

### Staff
- **List:** http://localhost:8000/prestasiprima/admin/staff
- **Create:** http://localhost:8000/prestasiprima/admin/staff/create
- **Edit:** http://localhost:8000/prestasiprima/admin/staff/{staff}/edit
- **Show:** http://localhost:8000/prestasiprima/admin/staff/{staff}

### Industri
- **List:** http://localhost:8000/prestasiprima/admin/industri
- **Create:** http://localhost:8000/prestasiprima/admin/industri/create
- **Edit:** http://localhost:8000/prestasiprima/admin/industri/{industri}/edit

### Testimoni
- **List:** http://localhost:8000/prestasiprima/admin/testimoni
- **Create:** http://localhost:8000/prestasiprima/admin/testimoni/create
- **Edit:** http://localhost:8000/prestasiprima/admin/testimoni/{id}/edit

### Ekstrakurikuler
- **List:** http://localhost:8000/prestasiprima/admin/ekstrakurikuler
- **Create:** http://localhost:8000/prestasiprima/admin/ekstrakurikuler/create
- **Edit:** http://localhost:8000/prestasiprima/admin/ekstrakurikuler/{id}/edit

### Karya Proyek
- **List:** http://localhost:8000/prestasiprima/admin/karya
- **Create:** http://localhost:8000/prestasiprima/admin/karya/create
- **Edit:** http://localhost:8000/prestasiprima/admin/karya/{id}/edit

### Mikrotik Academy
- **List:** http://localhost:8000/prestasiprima/admin/mikrotik
- **Create:** http://localhost:8000/prestasiprima/admin/mikrotik/create
- **Edit:** http://localhost:8000/prestasiprima/admin/mikrotik/{trainer}/edit

---

## 👥 User Management (Super Admin Only)
- **List Users:** http://localhost:8000/prestasiprima/admin/users
- **Create User:** http://localhost:8000/prestasiprima/admin/users/create
- **Edit User:** http://localhost:8000/prestasiprima/admin/users/{id}/edit

---

## 📧 Inbox/Contact (Super Admin & Moderator)
- **List Messages:** http://localhost:8000/prestasiprima/admin/contact
- **Show Message:** http://localhost:8000/prestasiprima/admin/contact/{id}

---

## 🔔 Notifications (Super Admin & Moderator)
- **List Notifications:** http://localhost:8000/prestasiprima/admin/notifications

---

## ⚙️ Settings (Super Admin Only)
- **Settings:** http://localhost:8000/prestasiprima/admin/settings
- **Backup:** http://localhost:8000/prestasiprima/admin/backup
- **Logs:** http://localhost:8000/prestasiprima/admin/logs

---

## 🔑 Account Settings (All Roles)
- **Change Password:** http://localhost:8000/prestasiprima/admin/password/edit

---

## 📌 Notes:
1. All admin routes require authentication via `/authPP/login`
2. Different features require different roles:
   - **Super Admin:** Full access to everything
   - **Editor:** Can create/edit content
   - **Moderator:** Can manage inbox and notifications
   - **Viewer:** Read-only access to content
3. The default admin account has Super Admin privileges
