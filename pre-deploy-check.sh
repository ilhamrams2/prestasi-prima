#!/bin/bash

################################################################################
# Pre-Deployment Checklist Script
# Memverifikasi bahwa aplikasi siap untuk production deployment
################################################################################

set -e

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

PASS=0
FAIL=0
WARN=0

echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}SMK Prestasi Prima - Pre-Deployment Check${NC}"
echo -e "${BLUE}========================================${NC}"
echo ""

check_pass() {
    echo -e "${GREEN}✓${NC} $1"
    ((PASS++))
}

check_fail() {
    echo -e "${RED}✗${NC} $1"
    ((FAIL++))
}

check_warn() {
    echo -e "${YELLOW}⚠${NC} $1"
    ((WARN++))
}

# 1. Check PHP Version
echo -e "${BLUE}[1/15] Checking PHP Version...${NC}"
PHP_VERSION=$(php -r "echo PHP_VERSION;" | cut -d. -f1,2)
if (( $(echo "$PHP_VERSION >= 8.1" | bc -l) )); then
    check_pass "PHP $PHP_VERSION is installed"
else
    check_fail "PHP version $PHP_VERSION is too old. Requires >= 8.1"
fi

# 2. Check Required PHP Extensions
echo -e "${BLUE}[2/15] Checking PHP Extensions...${NC}"
REQUIRED_EXTENSIONS=("mbstring" "xml" "curl" "zip" "gd" "mysql" "pdo")
for ext in "${REQUIRED_EXTENSIONS[@]}"; do
    if php -m | grep -i "^$ext$" > /dev/null; then
        check_pass "PHP extension: $ext"
    else
        check_fail "Missing PHP extension: $ext"
    fi
done

# 3. Check Composer
echo -e "${BLUE}[3/15] Checking Composer...${NC}"
if command -v composer &> /dev/null; then
    COMPOSER_VERSION=$(composer --version | cut -d' ' -f3)
    check_pass "Composer $COMPOSER_VERSION installed"
else
    check_fail "Composer not found"
fi

# 4. Check Node.js & NPM
echo -e "${BLUE}[4/15] Checking Node.js...${NC}"
if command -v node &> /dev/null; then
    NODE_VERSION=$(node --version)
    check_pass "Node.js $NODE_VERSION installed"
else
    check_fail "Node.js not found"
fi

if command -v npm &> /dev/null; then
    NPM_VERSION=$(npm --version)
    check_pass "NPM $NPM_VERSION installed"
else
    check_fail "NPM not found"
fi

# 5. Check .env file
echo -e "${BLUE}[5/15] Checking Environment Configuration...${NC}"
if [ -f .env ]; then
    check_pass ".env file exists"
    
    # Check critical env variables
    if grep -q "APP_KEY=base64:" .env; then
        check_pass "APP_KEY is set"
    else
        check_fail "APP_KEY not generated. Run: php artisan key:generate"
    fi
    
    if grep -q "APP_ENV=production" .env; then
        check_pass "APP_ENV set to production"
    else
        check_warn "APP_ENV not set to production"
    fi
    
    if grep -q "APP_DEBUG=false" .env; then
        check_pass "APP_DEBUG is disabled"
    else
        check_fail "APP_DEBUG should be false in production"
    fi
else
    check_fail ".env file not found"
fi

# 6. Check Database Connection
echo -e "${BLUE}[6/15] Checking Database Connection...${NC}"
if php artisan migrate:status &> /dev/null; then
    check_pass "Database connection successful"
else
    check_fail "Cannot connect to database"
fi

# 7. Check Storage Permissions
echo -e "${BLUE}[7/15] Checking File Permissions...${NC}"
if [ -w storage ]; then
    check_pass "storage/ is writable"
else
    check_fail "storage/ is not writable"
fi

if [ -w bootstrap/cache ]; then
    check_pass "bootstrap/cache/ is writable"
else
    check_fail "bootstrap/cache/ is not writable"
fi

if [ -d public/uploads ] && [ -w public/uploads ]; then
    check_pass "public/uploads/ is writable"
else
    check_warn "public/uploads/ should be writable for file uploads"
fi

# 8. Check Dependencies
echo -e "${BLUE}[8/15] Checking Dependencies...${NC}"
if [ -d vendor ]; then
    check_pass "Composer dependencies installed"
else
    check_fail "Vendor folder not found. Run: composer install"
fi

if [ -d node_modules ]; then
    check_pass "NPM dependencies installed"
else
    check_fail "node_modules not found. Run: npm install"
fi

# 9. Check Built Assets
echo -e "${BLUE}[9/15] Checking Built Assets...${NC}"
if [ -d public/build ] || [ -f public/build/manifest.json ]; then
    check_pass "Production assets built"
else
    check_warn "Assets not built. Run: npm run build"
fi

# 10. Check Git Status
echo -e "${BLUE}[10/15] Checking Git Status...${NC}"
if [ -d .git ]; then
    if [ -z "$(git status --porcelain)" ]; then
        check_pass "Git working directory is clean"
    else
        check_warn "Uncommitted changes detected"
    fi
    
    CURRENT_BRANCH=$(git branch --show-current)
    check_pass "Current branch: $CURRENT_BRANCH"
else
    check_warn "Not a git repository"
fi

# 11. Check Required Services
echo -e "${BLUE}[11/15] Checking System Services...${NC}"
if systemctl is-active --quiet nginx 2>/dev/null || systemctl is-active --quiet apache2 2>/dev/null; then
    check_pass "Web server is running"
else
    check_warn "Web server (nginx/apache) not detected"
fi

if systemctl is-active --quiet mysql 2>/dev/null || systemctl is-active --quiet mariadb 2>/dev/null; then
    check_pass "Database server is running"
else
    check_warn "Database server not detected"
fi

if systemctl is-active --quiet php8.3-fpm 2>/dev/null || systemctl is-active --quiet php-fpm 2>/dev/null; then
    check_pass "PHP-FPM is running"
else
    check_warn "PHP-FPM not detected"
fi

# 12. Check Laravel Optimizations
echo -e "${BLUE}[12/15] Checking Laravel Optimizations...${NC}"
if [ -f bootstrap/cache/config.php ]; then
    check_pass "Config cached"
else
    check_warn "Config not cached. Run: php artisan config:cache"
fi

if [ -f bootstrap/cache/routes-v7.php ]; then
    check_pass "Routes cached"
else
    check_warn "Routes not cached. Run: php artisan route:cache"
fi

# 13. Check Security
echo -e "${BLUE}[13/15] Checking Security...${NC}"
if grep -q "^\.env$" .gitignore 2>/dev/null; then
    check_pass ".env is in .gitignore"
else
    check_fail ".env should be in .gitignore"
fi

if [ ! -f .env.example ]; then
    check_warn ".env.example not found"
else
    check_pass ".env.example exists"
fi

# 14. Check Swagger Documentation
echo -e "${BLUE}[14/15] Checking API Documentation...${NC}"
if [ -d storage/api-docs ]; then
    check_pass "Swagger documentation generated"
else
    check_warn "Swagger docs not generated. Run: php artisan l5-swagger:generate"
fi

# 15. Check Deployment Script
echo -e "${BLUE}[15/15] Checking Deployment Files...${NC}"
if [ -f deploy.sh ]; then
    if [ -x deploy.sh ]; then
        check_pass "deploy.sh is executable"
    else
        check_warn "deploy.sh exists but not executable. Run: chmod +x deploy.sh"
    fi
else
    check_warn "deploy.sh not found"
fi

if [ -f DEPLOYMENT_GUIDE.md ]; then
    check_pass "Deployment documentation exists"
else
    check_warn "DEPLOYMENT_GUIDE.md not found"
fi

# Summary
echo ""
echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}Summary${NC}"
echo -e "${BLUE}========================================${NC}"
echo -e "${GREEN}Passed:${NC}  $PASS"
echo -e "${YELLOW}Warnings:${NC} $WARN"
echo -e "${RED}Failed:${NC}  $FAIL"
echo ""

if [ $FAIL -eq 0 ]; then
    echo -e "${GREEN}✓ Your application is ready for deployment!${NC}"
    echo ""
    echo "Next steps:"
    echo "1. Review .env configuration for production"
    echo "2. Backup your database"
    echo "3. Run: ./deploy.sh"
    exit 0
else
    echo -e "${RED}✗ Please fix the failed checks before deploying${NC}"
    echo ""
    echo "Common fixes:"
    echo "- Install missing PHP extensions"
    echo "- Run: composer install --no-dev"
    echo "- Run: npm ci && npm run build"
    echo "- Run: php artisan key:generate"
    echo "- Set proper file permissions"
    exit 1
fi
