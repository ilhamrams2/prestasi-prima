# 📧 Inbox Feature - Complete Documentation

## ✅ Implemented Features

### 1. **Filter & Search** 
- ✅ Filter by status: Semua / Belum Dibaca / Sudah Dibaca
- ✅ Search by: Nama, Email, atau Isi Pesan
- ✅ Reset button untuk clear filter
- ✅ Pagination tetap mempertahankan filter & search query

### 2. **Bulk Actions**
- ✅ Checkbox "Pilih Semua" untuk select semua pesan
- ✅ Bulk Mark as Read - Tandai banyak pesan sekaligus sebagai sudah dibaca
- ✅ Bulk Delete - Hapus banyak pesan sekaligus
- ✅ Dynamic bulk action bar (muncul saat ada pesan dipilih)
- ✅ Counter jumlah pesan yang dipilih

### 3. **Email Notification**
- ✅ Otomatis kirim email ke admin saat ada pesan baru
- ✅ Email template profesional dengan design modern
- ✅ Informasi lengkap: Nama, Email, Waktu, Isi Pesan
- ✅ Link langsung ke halaman detail pesan di admin panel
- ✅ Error handling (tidak gagalkan submit form jika email error)

### 4. **UI/UX Improvements**
- ✅ Removed "Butuh Bantuan?" widget dari dashboard
- ✅ Enhanced inbox interface dengan filter bar
- ✅ Responsive design untuk mobile & desktop
- ✅ Visual feedback untuk selected items
- ✅ Empty state yang informatif

---

## 🔧 Setup Email Notification

### Step 1: Konfigurasi .env

Tambahkan konfigurasi berikut ke file `.env`:

```env
# Email Admin
ADMIN_EMAIL=admin@prestasiprima.sch.id

# SMTP Configuration (contoh: Gmail)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@prestasiprima.sch.id
MAIL_FROM_NAME="SMK Prestasi Prima"
```

### Step 2: Setup Gmail App Password (jika pakai Gmail)

1. Buka Google Account Settings
2. Security → 2-Step Verification (aktifkan jika belum)
3. App Passwords → Generate password untuk "Mail"
4. Copy password tersebut ke `MAIL_PASSWORD` di .env

### Step 3: Test Email

Jalankan command berikut untuk test email:

```bash
php artisan tinker
```

Lalu jalankan:

```php
Mail::raw('Test email from Laravel', function($message) {
    $message->to('your-email@gmail.com')->subject('Test Email');
});
```

---

## 📖 How to Use

### **Filter Pesan**

1. Buka menu **Inbox Pesan**
2. Gunakan dropdown "Status" untuk filter:
   - **Semua Pesan** - Tampilkan semua
   - **Belum Dibaca** - Hanya pesan baru
   - **Sudah Dibaca** - Pesan yang sudah dibuka
3. Klik tombol **Filter**

### **Search Pesan**

1. Ketik kata kunci di search bar
2. Bisa cari berdasarkan: Nama pengirim, Email, atau Isi pesan
3. Klik tombol **Filter**
4. Klik **Reset** untuk clear pencarian

### **Bulk Actions**

#### Tandai Banyak Pesan sebagai Dibaca:
1. Centang checkbox di samping pesan yang ingin ditandai
2. Atau klik "Pilih Semua" untuk select semua
3. Klik tombol **Tandai Dibaca** di bulk action bar
4. Konfirmasi

#### Hapus Banyak Pesan:
1. Centang checkbox di samping pesan yang ingin dihapus
2. Klik tombol **Hapus** di bulk action bar (warna merah)
3. Konfirmasi penghapusan

### **Email Notification**

Saat pengunjung mengirim pesan via form Contact Us:
1. Pesan tersimpan di database
2. Email otomatis terkirim ke `ADMIN_EMAIL`
3. Admin bisa klik link di email untuk langsung buka detail pesan
4. Admin bisa balas via email client

---

## 🗂️ File Structure

```
app/
├── Http/Controllers/
│   └── prestasiprima/
│       ├── ContactController.php          # Handle form submission + email
│       └── admin/
│           └── AdminContactController.php # Inbox management
├── Mail/
│   └── NewContactMessageMail.php          # Email notification class
└── Models/prestasiprima/
    └── ContactMessage.php                 # Model dengan scopes

resources/views/
├── emails/
│   └── new-contact-message.blade.php      # Email template
└── prestasiprima/admin/contact/
    ├── index.blade.php                    # Inbox list (with filter & bulk)
    └── show.blade.php                     # Message detail

routes/
└── web.php                                # Routes untuk inbox

database/migrations/
└── 2026_02_03_125821_create_contact_messages_table.php
```

---

## 🎯 Routes

```php
// Admin Inbox Routes
GET  /prestasiprima/admin/contact              → index (with filter & search)
GET  /prestasiprima/admin/contact/{id}         → show detail
POST /prestasiprima/admin/contact/bulk-mark-read → bulk mark as read
POST /prestasiprima/admin/contact/bulk-delete    → bulk delete
POST /prestasiprima/admin/contact/{id}/mark-read → single mark as read
DELETE /prestasiprima/admin/contact/{id}         → delete single message
```

---

## 🔍 Query Parameters (Filter & Search)

```
?status=unread          → Filter belum dibaca
?status=read            → Filter sudah dibaca
?status=all             → Tampilkan semua (default)
?search=keyword         → Search by nama/email/pesan
?status=unread&search=john → Kombinasi filter + search
```

---

## 🚀 Performance Tips

1. **Pagination**: Default 20 pesan per halaman
2. **Indexing**: Tambahkan index di kolom `is_read` untuk query lebih cepat
3. **Queue**: Untuk production, gunakan queue untuk email:
   ```php
   // Di ContactController.php
   Mail::to($adminEmail)->queue(new NewContactMessageMail($message));
   ```

---

## 🐛 Troubleshooting

### Email tidak terkirim?

1. **Check .env configuration**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

2. **Check log file**
   ```
   storage/logs/laravel.log
   ```

3. **Test SMTP connection**
   - Pastikan port 587 tidak diblokir firewall
   - Coba gunakan Mailtrap.io untuk testing

### Bulk actions tidak bekerja?

1. Pastikan JavaScript tidak error (check browser console)
2. Clear browser cache
3. Pastikan CSRF token valid

### Filter tidak mempertahankan query?

- Pastikan pagination menggunakan `appends(request()->query())`

---

## 📝 Notes

- Email notification menggunakan **try-catch** sehingga tidak akan gagalkan form submission jika email error
- Bulk actions menggunakan **JSON array** untuk mengirim multiple IDs
- Filter & search **case-insensitive** menggunakan SQL LIKE
- Auto mark as read saat pesan dibuka di detail page

---

## 🎨 Customization

### Ubah Email Template

Edit file: `resources/views/emails/new-contact-message.blade.php`

### Ubah Admin Email

Edit `.env`:
```env
ADMIN_EMAIL=newemail@example.com
```

### Ubah Jumlah Pesan per Halaman

Edit `AdminContactController.php`:
```php
$messages = $query->latest()->paginate(50); // dari 20 ke 50
```

---

**🎉 All features are now fully implemented and ready to use!**
