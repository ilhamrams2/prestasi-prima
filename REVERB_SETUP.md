# Laravel Reverb - WebSocket Server Setup

## 📋 Overview
Aplikasi ini menggunakan **Laravel Reverb** sebagai WebSocket server untuk fitur realtime (notifikasi admin).

Migrasi dari `beyondcode/laravel-websockets` ke `laravel/reverb` pada: **4 Februari 2026**

---

## 🚀 Development

### Start Reverb Server
```bash
php artisan reverb:start
```

Server akan berjalan di: `http://localhost:8080`

### Start Laravel + Vite (3 Terminal)
```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev

# Terminal 3: Reverb WebSocket Server
php artisan reverb:start
```

---

## 🏭 Production Deployment

### 1. Install Supervisor (Process Manager)
Reverb perlu berjalan sebagai background process. Gunakan **Supervisor** untuk auto-restart.

#### Install Supervisor (Ubuntu/Debian)
```bash
sudo apt-get install supervisor
```

### 2. Create Supervisor Config
Buat file: `/etc/supervisor/conf.d/reverb.conf`

```ini
[program:reverb]
process_name=%(program_name)s
command=php /path/to/your/project/artisan reverb:start
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/path/to/your/project/storage/logs/reverb.log
stopwaitsecs=3600
```

### 3. Start Supervisor
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start reverb
```

### 4. Check Status
```bash
sudo supervisorctl status reverb
```

---

## 🔧 Configuration

### Environment Variables (.env)
```env
BROADCAST_DRIVER=reverb

REVERB_APP_ID=872014
REVERB_APP_KEY=03hvcqx6ymkzjilrnb0c
REVERB_APP_SECRET=jdubjjl5c1jrrpa8rfmq
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```

**Production:** Ubah `REVERB_SCHEME=https` dan `REVERB_PORT=443` jika menggunakan SSL.

---

## 📡 Features Using Reverb

### 1. Admin Activity Notifications
- **Event:** `App\Events\ActivityLogged`
- **Channel:** `admin-activity`
- **Listener:** `resources/views/layouts/admin.blade.php` (line 756-803)

**Triggered when:**
- Admin creates/updates/deletes data
- Real-time notification appears in admin dashboard

---

## 🐛 Troubleshooting

### Reverb tidak connect
1. Pastikan Reverb server running: `php artisan reverb:start`
2. Check browser console untuk error WebSocket
3. Pastikan port 8080 tidak diblokir firewall

### Notifikasi tidak muncul
1. Check `.env`: `BROADCAST_DRIVER=reverb`
2. Rebuild assets: `npm run build`
3. Clear cache: `php artisan config:clear`
4. Restart Reverb server

### Port 8080 sudah dipakai
Ubah di `.env`:
```env
REVERB_PORT=8081
VITE_REVERB_PORT="8081"
```
Lalu rebuild: `npm run build`

---

## 📊 Performance Tips

### 1. Use Redis for Scaling (Optional)
Jika butuh horizontal scaling (multiple servers):

```env
REVERB_SCALING_ENABLED=true
REDIS_HOST=127.0.0.1
REDIS_PORT=6379
```

### 2. Monitor Connections
```bash
# Check active connections via logs
tail -f storage/logs/reverb.log
```

---

## 🔄 Migration Notes

### What Changed?
- ❌ Removed: `beyondcode/laravel-websockets`
- ✅ Added: `laravel/reverb`
- 📝 Updated: `resources/js/bootstrap.js` (broadcaster config)
- 🗑️ Deleted: `config/websockets.php`

### Why Migrate?
- `beyondcode/laravel-websockets` is **abandoned** (no security updates)
- Laravel Reverb is **official** (first-party package)
- **5-10x faster** (written in Go, not PHP)
- **50% less memory** usage
- **Future-proof** (always compatible with new Laravel versions)

---

## 📚 Resources

- [Laravel Reverb Docs](https://laravel.com/docs/10.x/reverb)
- [Laravel Broadcasting](https://laravel.com/docs/10.x/broadcasting)
- [Supervisor Documentation](http://supervisord.org/)

---

**Last Updated:** 4 Februari 2026  
**Maintained by:** Development Team
