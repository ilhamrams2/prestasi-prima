---
sidebar_position: 4
---

# Menggunakan Script Deployment

Script deployment otomatis untuk production server.

## Download Script

Script tersedia di: `deploy.sh` (root project)

## Cara Penggunaan

### Persiapan Awal

1. **Upload ke Server**
```bash
scp deploy.sh user@server:/var/www/prestasi-prima/
ssh user@server
cd /var/www/prestasi-prima
chmod +x deploy.sh
```

2. **Setup Service Reverb**

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

Enable:
```bash
sudo systemctl daemon-reload
sudo systemctl enable reverb
sudo systemctl start reverb
```

### Jalankan Deployment

```bash
cd /var/www/prestasi-prima
sudo ./deploy.sh
```

## Fitur Script

| Tahap | Deskripsi |
|-------|-----------|
| 1. Maintenance Mode | Aktifkan halaman maintenance |
| 2. Backup | Backup database, .env, git commit |
| 3. Pull Code | Update dari git repository |
| 4. Dependencies | Install Composer & NPM |
| 5. Build Assets | Compile production assets |
| 6. Migrations | Update database schema |
| 7. Optimization | Cache routes, config, views |
| 8. API Docs | Generate Swagger docs |
| 9. Permissions | Set file/folder permissions |
| 10. Services | Restart PHP, Nginx, Reverb |
| 11. Health Check | Verify app is working |
| 12. Go Live | Disable maintenance mode |
| 13. Cleanup | Remove old backups |

## Rollback

Script otomatis rollback jika terjadi error.

**Manual rollback database:**
```bash
cd /var/backups/prestasi-prima
mysql -u user -p database < db_backup_TIMESTAMP.sql
```

## Logs

Lihat deployment log:
```bash
tail -f /var/log/prestasi-prima-deploy.log
```

## Troubleshooting

### Permission Denied
```bash
sudo ./deploy.sh
```

### Reverb Tidak Start
```bash
sudo systemctl restart reverb
sudo systemctl status reverb
```

### Migration Error
```bash
php artisan migrate:rollback
php artisan migrate
```

## Automation

### Auto-deploy via Cron

Deploy setiap hari jam 2 pagi:
```bash
sudo crontab -e
```

Tambahkan:
```
0 2 * * * cd /var/www/prestasi-prima && ./deploy.sh >> /var/log/cron-deploy.log 2>&1
```

### Git Webhook (Advanced)

1. Setup webhook endpoint di Laravel
2. Trigger deployment saat push
3. Gunakan queue untuk async processing
