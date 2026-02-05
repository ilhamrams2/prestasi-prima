#!/bin/bash

################################################################################
# SMK Prestasi Prima - Production Deployment Script
# Author: SMK Prestasi Prima Dev Team
# Description: Automated deployment script dengan rollback capability
################################################################################

set -e  # Exit on error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Configuration
APP_DIR="/var/www/prestasi-prima"
BACKUP_DIR="/var/backups/prestasi-prima"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
LOG_FILE="/var/log/prestasi-prima-deploy.log"

# Create backup directory if not exists
mkdir -p "$BACKUP_DIR"

################################################################################
# Helper Functions
################################################################################

log() {
    echo -e "${BLUE}[$(date +'%Y-%m-%d %H:%M:%S')]${NC} $1" | tee -a "$LOG_FILE"
}

success() {
    echo -e "${GREEN}✓${NC} $1" | tee -a "$LOG_FILE"
}

error() {
    echo -e "${RED}✗${NC} $1" | tee -a "$LOG_FILE"
}

warning() {
    echo -e "${YELLOW}⚠${NC} $1" | tee -a "$LOG_FILE"
}

# Rollback function
rollback() {
    error "Deployment failed! Rolling back..."
    
    if [ -f "$BACKUP_DIR/latest_commit.txt" ]; then
        LAST_COMMIT=$(cat "$BACKUP_DIR/latest_commit.txt")
        cd "$APP_DIR"
        git reset --hard "$LAST_COMMIT"
        success "Code rolled back to commit: $LAST_COMMIT"
    fi
    
    if [ -f "$BACKUP_DIR/db_backup_$TIMESTAMP.sql" ]; then
        warning "Database backup available at: $BACKUP_DIR/db_backup_$TIMESTAMP.sql"
        warning "Restore manually if needed: mysql -u user -p database < backup.sql"
    fi
    
    exit 1
}

# Trap errors and rollback
trap rollback ERR

################################################################################
# Pre-Deployment Checks
################################################################################

log "=========================================="
log "Starting Deployment Process"
log "=========================================="

# Check if running as www-data or root
if [ "$EUID" -ne 0 ] && [ "$(whoami)" != "www-data" ]; then 
    error "Please run as root or www-data user"
    exit 1
fi

# Check if we're in the right directory
if [ ! -f "$APP_DIR/artisan" ]; then
    error "Laravel artisan not found. Are you in the correct directory?"
    exit 1
fi

cd "$APP_DIR"

################################################################################
# 1. Enable Maintenance Mode
################################################################################

log "Step 1: Enabling maintenance mode..."
php artisan down --retry=60 --render="errors::503" || true
success "Maintenance mode enabled"

################################################################################
# 2. Backup Current State
################################################################################

log "Step 2: Creating backup..."

# Save current git commit
git rev-parse HEAD > "$BACKUP_DIR/latest_commit.txt"
success "Current commit saved"

# Backup database
DB_NAME=$(grep DB_DATABASE .env | cut -d '=' -f2)
DB_USER=$(grep DB_USERNAME .env | cut -d '=' -f2)
DB_PASS=$(grep DB_PASSWORD .env | cut -d '=' -f2)

if [ ! -z "$DB_NAME" ]; then
    mysqldump -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" > "$BACKUP_DIR/db_backup_$TIMESTAMP.sql"
    success "Database backed up: db_backup_$TIMESTAMP.sql"
fi

# Backup .env file
cp .env "$BACKUP_DIR/env_backup_$TIMESTAMP"
success ".env file backed up"

################################################################################
# 3. Pull Latest Code
################################################################################

log "Step 3: Pulling latest code from repository..."
git fetch origin
git reset --hard origin/main  # Change 'main' to your branch name
success "Code updated from repository"

################################################################################
# 4. Update PHP Dependencies
################################################################################

log "Step 4: Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction
success "Composer dependencies installed"

################################################################################
# 5. Update Node Dependencies & Build Assets
################################################################################

log "Step 5: Building frontend assets..."

# Install dependencies
npm ci --production=false
success "NPM dependencies installed"

# Build production assets
npm run build
success "Assets compiled for production"

################################################################################
# 6. Run Database Migrations
################################################################################

log "Step 6: Running database migrations..."
php artisan migrate --force
success "Database migrations completed"

################################################################################
# 7. Clear & Optimize Caches
################################################################################

log "Step 7: Clearing and optimizing caches..."

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
success "All caches cleared"

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
success "Application optimized for production"

################################################################################
# 8. Generate API Documentation
################################################################################

log "Step 8: Generating API documentation..."
php artisan l5-swagger:generate
success "Swagger documentation generated"

################################################################################
# 9. Set Proper Permissions
################################################################################

log "Step 9: Setting file permissions..."

# Set ownership
chown -R www-data:www-data "$APP_DIR"
success "Ownership set to www-data"

# Set directory permissions
find "$APP_DIR" -type d -exec chmod 755 {} \;
find "$APP_DIR" -type f -exec chmod 644 {} \;
success "Base permissions set"

# Set writable directories
chmod -R 775 "$APP_DIR/storage"
chmod -R 775 "$APP_DIR/bootstrap/cache"
chmod -R 775 "$APP_DIR/public/uploads"
success "Writable directories configured"

# Make artisan executable
chmod +x "$APP_DIR/artisan"
success "Artisan made executable"

################################################################################
# 10. Restart Services
################################################################################

log "Step 10: Restarting services..."

# Restart PHP-FPM
if systemctl is-active --quiet php8.3-fpm; then
    systemctl restart php8.3-fpm
    success "PHP-FPM restarted"
fi

# Restart Reverb (WebSocket server)
if systemctl is-active --quiet reverb; then
    systemctl restart reverb
    success "Reverb WebSocket server restarted"
else
    warning "Reverb service not found. Starting manually..."
    systemctl start reverb || warning "Could not start Reverb automatically"
fi

# Restart Queue Workers (if configured)
if systemctl is-active --quiet laravel-worker; then
    systemctl restart laravel-worker
    success "Queue workers restarted"
fi

# Restart Nginx
if systemctl is-active --quiet nginx; then
    systemctl reload nginx
    success "Nginx reloaded"
fi

################################################################################
# 11. Health Checks
################################################################################

log "Step 11: Running health checks..."

# Check if application responds
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost)
if [ "$HTTP_CODE" -eq 200 ] || [ "$HTTP_CODE" -eq 302 ]; then
    success "Application is responding (HTTP $HTTP_CODE)"
else
    warning "Application returned HTTP $HTTP_CODE"
fi

# Check Reverb WebSocket
if systemctl is-active --quiet reverb; then
    success "Reverb is running"
else
    warning "Reverb is not running"
fi

################################################################################
# 12. Disable Maintenance Mode
################################################################################

log "Step 12: Disabling maintenance mode..."
php artisan up
success "Application is now live!"

################################################################################
# 13. Cleanup Old Backups
################################################################################

log "Step 13: Cleaning up old backups..."
find "$BACKUP_DIR" -name "db_backup_*.sql" -mtime +7 -delete
find "$BACKUP_DIR" -name "env_backup_*" -mtime +7 -delete
success "Old backups cleaned (kept last 7 days)"

################################################################################
# Deployment Summary
################################################################################

log "=========================================="
log "Deployment Completed Successfully!"
log "=========================================="
success "Timestamp: $TIMESTAMP"
success "Application: SMK Prestasi Prima Portal"
success "Environment: Production"
success "Commit: $(git rev-parse --short HEAD)"

# Optional: Send notification (uncomment if using Slack/Discord)
# curl -X POST -H 'Content-type: application/json' \
#   --data "{\"text\":\"✅ Deployment successful: SMK Prestasi Prima Portal\"}" \
#   YOUR_WEBHOOK_URL

log "Deployment log saved to: $LOG_FILE"
log "=========================================="

exit 0
