# SMK Prestasi Prima - Deployment Guide

## Prerequisites

Sebelum deploy, pastikan server sudah tersetup dengan:
- PHP 8.3+
- MySQL 8.0+
- Nginx/Apache
- Composer
- Node.js 18+
- Systemd services untuk Reverb

## Installation

### 1. Upload Script ke Server

```bash
# Upload deploy.sh ke server
scp deploy.sh user@server:/var/www/prestasi-prima/

# Set executable permission
ssh user@server
chmod +x /var/www/prestasi-prima/deploy.sh
```

### 2. Setup Systemd Service untuk Reverb

Buat file `/etc/systemd/system/reverb.service`:

```ini
[Unit]
Description=Laravel Reverb WebSocket Server
After=network.target

[Service]
Type=simple
User=www-data
WorkingDirectory=/var/www/prestasi-prima
ExecStart=/usr/bin/php /var/www/prestasi-prima/artisan reverb:start --host=0.0.0.0 --port=8080
Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
```

Enable service:
```bash
sudo systemctl daemon-reload
sudo systemctl enable reverb
sudo systemctl start reverb
```

## Usage

### Deploy to Production

```bash
cd /var/www/prestasi-prima
sudo ./deploy.sh
```

### Deploy dengan Custom Branch

Edit file `deploy.sh` line 126:
```bash
git reset --hard origin/main  # Ganti 'main' dengan branch Anda
```

### View Deployment Logs

```bash
tail -f /var/log/prestasi-prima-deploy.log
```

## What the Script Does

1. ✅ **Maintenance Mode** - Menampilkan halaman maintenance
2. ✅ **Backup** - Backup database, .env, dan git commit
3. ✅ **Pull Code** - Update code dari repository
4. ✅ **Dependencies** - Install Composer & NPM packages
5. ✅ **Build Assets** - Compile CSS/JS untuk production
6. ✅ **Migrations** - Update database schema
7. ✅ **Optimization** - Cache config, routes, views
8. ✅ **API Docs** - Generate Swagger documentation
9. ✅ **Permissions** - Set proper file/folder permissions
10. ✅ **Services** - Restart PHP-FPM, Nginx, Reverb
11. ✅ **Health Check** - Verify application is working
12. ✅ **Go Live** - Disable maintenance mode
13. ✅ **Cleanup** - Remove old backups (>7 days)

## Rollback

Jika deployment gagal, script akan otomatis rollback ke commit sebelumnya.

Manual rollback database:
```bash
cd /var/backups/prestasi-prima
mysql -u username -p database_name < db_backup_TIMESTAMP.sql
```

## Troubleshooting

### Script Gagal di Step Tertentu

Cek log:
```bash
tail -100 /var/log/prestasi-prima-deploy.log
```

### Permission Denied

Jalankan sebagai root atau www-data:
```bash
sudo ./deploy.sh
# atau
sudo -u www-data ./deploy.sh
```

### Reverb Tidak Start

Manual start:
```bash
sudo systemctl start reverb
sudo systemctl status reverb
```

### Database Migration Error

Rollback migration:
```bash
php artisan migrate:rollback
```

## Automation (Optional)

### Setup Git Webhook

Untuk auto-deploy saat push ke repository:

1. Buat endpoint di Laravel untuk menerima webhook
2. Trigger script saat webhook diterima
3. Gunakan queue untuk menjalankan async

### Setup Cron (Scheduled Deployment)

Deploy otomatis setiap hari jam 2 pagi:
```bash
sudo crontab -e
# Add:
0 2 * * * cd /var/www/prestasi-prima && ./deploy.sh >> /var/log/cron-deploy.log 2>&1
```

## Security Notes

- ✅ Script membackup data sebelum deploy
- ✅ Rollback otomatis jika terjadi error
- ✅ Set proper file permissions
- ✅ Cache sensitive config files
- ⚠️ Jangan commit .env ke git
- ⚠️ Gunakan SSH key untuk git pull
- ⚠️ Pastikan MySQL credentials aman

## Support

Jika ada masalah deployment, hubungi:
- Email: admin@prestasiprima.sch.id
- Check documentation: http://localhost:3000
