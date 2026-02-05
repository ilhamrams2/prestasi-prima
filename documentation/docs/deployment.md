---
sidebar_position: 3
---

# Deployment Guide

Panduan lengkap untuk deploy Portal SMK Prestasi Prima ke production.

## Pre-requisites

### Server Requirements
- **PHP 8.1+** (Rekomendasi: 8.3)
- **Composer** 2.x
- **Node.js** 18.x atau lebih baru
- **MySQL** 8.0+ atau MariaDB 10.6+
- **Nginx** atau Apache dengan mod_rewrite
- **SSL Certificate** (Let's Encrypt recommended)

### Server Setup (Ubuntu/Debian)

```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install PHP 8.3 & extensions
sudo apt install php8.3-fpm php8.3-mysql php8.3-mbstring php8.3-xml php8.3-curl php8.3-zip php8.3-gd

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Install MySQL
sudo apt install mysql-server
sudo mysql_secure_installation
```

## Deployment Steps

### 1. Clone Repository

```bash
cd /var/www
git clone <repository-url> prestasi-prima
cd prestasi-prima
```

### 2. Install Dependencies

```bash
# PHP dependencies
composer install --no-dev --optimize-autoloader

# Node dependencies & build assets
npm ci
npm run build
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Edit `.env` file:

```env
APP_NAME="SMK Prestasi Prima"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://prestasiprima.sch.id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smkpp_prod
DB_USERNAME=your_db_user
DB_PASSWORD=your_secure_password

BROADCAST_DRIVER=reverb
REVERB_APP_ID=your_app_id
REVERB_APP_KEY=your_app_key
REVERB_APP_SECRET=your_app_secret
REVERB_HOST=0.0.0.0
REVERB_PORT=8080
REVERB_SCHEME=https

MAIL_MAILER=smtp
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@prestasiprima.sch.id"
```

### 4. Database Migration

```bash
# Run migrations
php artisan migrate --force

# Seed initial data (optional, only first deployment)
php artisan db:seed --force
```

### 5. Set Permissions

```bash
# Set ownership
sudo chown -R www-data:www-data /var/www/prestasi-prima

# Set permissions
sudo chmod -R 755 /var/www/prestasi-prima
sudo chmod -R 775 /var/www/prestasi-prima/storage
sudo chmod -R 775 /var/www/prestasi-prima/bootstrap/cache
```

### 6. Optimize Laravel

```bash
# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Generate Swagger docs
php artisan l5-swagger:generate
```

## Web Server Configuration

### Nginx Configuration

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name prestasiprima.sch.id www.prestasiprima.sch.id;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name prestasiprima.sch.id www.prestasiprima.sch.id;

    root /var/www/prestasi-prima/public;
    index index.php;

    # SSL Certificates
    ssl_certificate /etc/letsencrypt/live/prestasiprima.sch.id/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/prestasiprima.sch.id/privkey.pem;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # WebSocket Proxy (Reverb)
    location /app {
        proxy_pass http://127.0.0.1:8080;
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "Upgrade";
        proxy_set_header Host $host;
    }
}
```

Apply configuration:
```bash
sudo ln -s /etc/nginx/sites-available/prestasi-prima /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

## Reverb WebSocket Service

### Create Systemd Service

```bash
sudo nano /etc/systemd/system/reverb.service
```

Content:
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

Enable & start:
```bash
sudo systemctl daemon-reload
sudo systemctl enable reverb
sudo systemctl start reverb
sudo systemctl status reverb
```

## SSL Certificate (Let's Encrypt)

```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Obtain certificate
sudo certbot --nginx -d prestasiprima.sch.id -d www.prestasiprima.sch.id

# Auto-renewal (already configured by certbot)
sudo certbot renew --dry-run
```

## Monitoring & Maintenance

### Log Monitoring

```bash
# Application logs
tail -f /var/www/prestasi-prima/storage/logs/laravel.log

# Nginx logs
tail -f /var/log/nginx/error.log

# Reverb logs
sudo journalctl -u reverb -f
```

### Database Backup

```bash
# Create backup script
sudo nano /usr/local/bin/backup-db.sh
```

```bash
#!/bin/bash
BACKUP_DIR="/backups/mysql"
DATE=$(date +"%Y%m%d_%H%M%S")
mysqldump -u backup_user -p'password' smkpp_prod > $BACKUP_DIR/smkpp_$DATE.sql
find $BACKUP_DIR -type f -mtime +7 -delete
```

```bash
sudo chmod +x /usr/local/bin/backup-db.sh

# Add to crontab (daily at 2 AM)
sudo crontab -e
0 2 * * * /usr/local/bin/backup-db.sh
```

## Troubleshooting

### Clear All Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Permission Issues
```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 500 Internal Server Error
- Check `storage/logs/laravel.log`
- Verify `.env` configuration
- Ensure all dependencies installed
- Check file permissions

### WebSocket Not Connecting
- Verify Reverb service is running
- Check firewall rules (port 8080)
- Verify Nginx WebSocket proxy
- Check SSL certificate validity
