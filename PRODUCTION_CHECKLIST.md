# PRODUCTION DEPLOYMENT CHECKLIST

## Pre-Deployment (Local)

### 1. Code Quality
- [ ] Semua fitur sudah tested
- [ ] Tidak ada console.log() tersisa
- [ ] Tidak ada TODO/FIXME critical
- [ ] Code sudah direview
- [ ] Git working directory clean

### 2. Environment Configuration
- [ ] Copy `.env.production.example` ke server sebagai `.env`
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate `APP_KEY` baru
- [ ] Update database credentials
- [ ] Update mail credentials
- [ ] Set proper `APP_URL`

### 3. Dependencies
- [ ] `composer.lock` updated
- [ ] `package-lock.json` updated
- [ ] Tidak ada package vulnerable (cek `npm audit`)

### 4. Assets
- [ ] Build production assets: `npm run build`
- [ ] Verifikasi asset manifest exists
- [ ] Compressed images
- [ ] Fonts di-host local (no CDN)

### 5. Database
- [ ] Backup database production (jika update)
- [ ] Test migrations di staging dulu
- [ ] Seeders hanya untuk initial deployment
- [ ] Index database sudah optimal

## Server Setup

### 1. System Requirements
- [ ] PHP 8.3+ installed
- [ ] MySQL 8.0+ installed
- [ ] Nginx/Apache configured
- [ ] Composer installed globally
- [ ] Node.js 18+ & NPM installed
- [ ] Git installed
- [ ] SSL Certificate installed

### 2. PHP Extensions
```bash
php -m | grep -E "mbstring|xml|curl|zip|gd|mysql|pdo"
```
- [ ] mbstring
- [ ] xml
- [ ] curl
- [ ] zip
- [ ] gd
- [ ] mysql
- [ ] pdo_mysql

### 3. Directory Structure
```bash
mkdir -p /var/www/prestasi-prima
mkdir -p /var/backups/prestasi-prima
mkdir -p /var/log
```
- [ ] Application directory created
- [ ] Backup directory created
- [ ] Log directory writable

### 4. File Permissions
```bash
chmod -R 755 /var/www/prestasi-prima
chmod -R 775 /var/www/prestasi-prima/storage
chmod -R 775 /var/www/prestasi-prima/bootstrap/cache
chown -R www-data:www-data /var/www/prestasi-prima
```
- [ ] Proper ownership set
- [ ] Storage writable
- [ ] Bootstrap/cache writable

## Deployment

### 1. Upload Files
```bash
# Via Git (Recommended)
cd /var/www/prestasi-prima
git clone <repository-url> .

# Or via SCP
scp -r * user@server:/var/www/prestasi-prima/
```
- [ ] Code uploaded
- [ ] `.env` file configured
- [ ] Upload scripts (`deploy.sh`, `pre-deploy-check.sh`)

### 2. Run Pre-Deployment Check
```bash
chmod +x pre-deploy-check.sh
./pre-deploy-check.sh
```
- [ ] All checks passed
- [ ] Warnings addressed (if critical)

### 3. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
npm ci --production
npm run build
```
- [ ] PHP dependencies installed
- [ ] Node dependencies installed
- [ ] Assets built for production

### 4. Database Setup
```bash
php artisan migrate --force
# Only first time:
# php artisan db:seed --force
```
- [ ] Migrations ran successfully
- [ ] Seeders ran (if first deployment)

### 5. Laravel Optimization
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```
- [ ] Config cached
- [ ] Routes cached
- [ ] Views cached
- [ ] Events cached

### 6. Generate API Documentation
```bash
php artisan l5-swagger:generate
```
- [ ] Swagger docs generated

### 7. Setup Reverb Service
Create `/etc/systemd/system/reverb.service`:
```ini
[Unit]
Description=Laravel Reverb WebSocket Server
After=network.target

[Service]
Type=simple
User=www-data
WorkingDirectory=/var/www/prestasi-prima
ExecStart=/usr/bin/php artisan reverb:start --host=0.0.0.0 --port=8080
Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
```

```bash
sudo systemctl daemon-reload
sudo systemctl enable reverb
sudo systemctl start reverb
```
- [ ] Service file created
- [ ] Service enabled
- [ ] Service running

### 8. Configure Web Server

**Nginx** (`/etc/nginx/sites-available/prestasi-prima`):
```nginx
server {
    listen 80;
    server_name prestasiprima.sch.id;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name prestasiprima.sch.id;
    root /var/www/prestasi-prima/public;
    index index.php;

    ssl_certificate /etc/letsencrypt/live/prestasiprima.sch.id/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/prestasiprima.sch.id/privkey.pem;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location /app {
        proxy_pass http://127.0.0.1:8080;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "Upgrade";
    }
}
```
- [ ] Nginx config created
- [ ] Config tested: `nginx -t`
- [ ] Nginx reloaded

### 9. SSL Certificate
```bash
certbot --nginx -d prestasiprima.sch.id
```
- [ ] SSL certificate obtained
- [ ] Auto-renewal configured

## Post-Deployment

### 1. Verification
- [ ] Website accessible: https://prestasiprima.sch.id
- [ ] Admin panel accessible
- [ ] PresmaBoard accessible
- [ ] API documentation accessible: /api/documentation
- [ ] WebSocket connecting (check browser console)
- [ ] No errors in logs: `tail -f storage/logs/laravel.log`

### 2. Performance Check
- [ ] Page load time < 3s
- [ ] All images loading
- [ ] CSS/JS loading correctly
- [ ] No 404 errors

### 3. Functionality Test
- [ ] Login works (admin & user)
- [ ] Database read/write works
- [ ] File upload works
- [ ] Email sending works
- [ ] Real-time features work (chat, notifications)

### 4. Monitoring Setup
```bash
# Setup log rotation
cat > /etc/logrotate.d/prestasi-prima << EOF
/var/www/prestasi-prima/storage/logs/*.log {
    daily
    rotate 14
    compress
    delaycompress
    notifempty
    create 0640 www-data www-data
    sharedscripts
}
EOF
```
- [ ] Log rotation configured
- [ ] Monitoring tools setup (optional)
- [ ] Backup automation configured

### 5. Database Backup Automation
```bash
# Create backup script
cat > /usr/local/bin/backup-prestasi-prima.sh << 'EOF'
#!/bin/bash
BACKUP_DIR="/var/backups/prestasi-prima"
DATE=$(date +"%Y%m%d_%H%M%S")
DB_NAME=$(grep DB_DATABASE /var/www/prestasi-prima/.env | cut -d '=' -f2)
DB_USER=$(grep DB_USERNAME /var/www/prestasi-prima/.env | cut -d '=' -f2)
DB_PASS=$(grep DB_PASSWORD /var/www/prestasi-prima/.env | cut -d '=' -f2)
mysqldump -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" | gzip > "$BACKUP_DIR/db_$DATE.sql.gz"
find "$BACKUP_DIR" -name "db_*.sql.gz" -mtime +7 -delete
EOF

chmod +x /usr/local/bin/backup-prestasi-prima.sh

# Add to crontab (daily 2 AM)
echo "0 2 * * * /usr/local/bin/backup-prestasi-prima.sh" | crontab -
```
- [ ] Backup script created
- [ ] Cron job added
- [ ] Test backup manually

## Ongoing Maintenance

### Regular Updates
```bash
cd /var/www/prestasi-prima
./deploy.sh
```
- [ ] Use automated deployment script
- [ ] Monitor deployment logs
- [ ] Keep dependencies updated

### Security
- [ ] Update SSL certificate before expiry
- [ ] Regular `composer update` security patches
- [ ] Monitor Laravel security advisories

### Backup
- [ ] Verify backups daily
- [ ] Test restore procedure monthly
- [ ] Keep backups offsite

## Rollback Procedure

Jika terjadi masalah:

1. **Code Rollback**:
```bash
cd /var/www/prestasi-prima
git log --oneline -n 5
git reset --hard <previous-commit>
```

2. **Database Rollback**:
```bash
cd /var/backups/prestasi-prima
mysql -u user -p database < db_TIMESTAMP.sql
```

3. **Clear Caches**:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

4. **Restart Services**:
```bash
systemctl restart php8.3-fpm
systemctl restart nginx
systemctl restart reverb
```

## Emergency Contacts

- **Developer**: admin@prestasiprima.sch.id
- **Server Admin**: [Your Name]
- **Hosting Support**: [Hosting Provider]

---

**Last Updated**: $(date +"%Y-%m-%d")
**Deployment Script Version**: 1.0
