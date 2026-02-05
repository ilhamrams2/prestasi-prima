# Git + SSH Deployment Guide

## Complete Setup untuk Git + SSH Deployment

### Part 1: Setup di Server (Production)

#### 1.1. Generate SSH Key di Server

Login ke server via SSH:

```bash
ssh user@your-server.com
```

Generate SSH key pair:

```bash
# Generate key
ssh-keygen -t ed25519 -C "deploy@prestasiprima.sch.id" -f ~/.ssh/prestasi-prima-deploy

# View public key (copy ini)
cat ~/.ssh/prestasi-prima-deploy.pub
```

#### 1.2. Add Public Key ke GitHub

1. Buka repository di GitHub
2. Settings → Deploy keys → Add deploy key
3. Title: `Production Server`
4. Key: Paste public key dari step sebelumnya
5. ✅ Allow write access (jika perlu)
6. Add key

#### 1.3. Clone Repository

```bash
# Navigate to web directory
cd /var/www

# Clone repository
git clone git@github.com:YOUR_USERNAME/prestasi-prima.git

# Set proper ownership
sudo chown -R www-data:www-data prestasi-prima
sudo chmod -R 755 prestasi-prima
```

#### 1.4. Setup Git Config

```bash
cd /var/www/prestasi-prima

# Configure git
git config core.fileMode false
git config pull.rebase false
git config user.name "Production Server"
git config user.email "deploy@prestasiprima.sch.id"
```

#### 1.5. Setup Post-Receive Hook (Optional - Auto Deploy saat Push)

```bash
# Navigate to git hooks
cd /var/www/prestasi-prima/.git/hooks

# Create post-merge hook
cat > post-merge << 'EOF'
#!/bin/bash

echo "🚀 Running post-merge deployment..."

cd /var/www/prestasi-prima

# Run deployment script
./deploy.sh

echo "✅ Deployment completed!"
EOF

# Make executable
chmod +x post-merge
```

---

### Part 2: Setup GitHub Actions (Automated Deployment)

#### 2.1. Generate SSH Key untuk GitHub Actions

Di **komputer lokal** Anda:

```bash
# Generate dedicated key untuk GitHub Actions
ssh-keygen -t ed25519 -C "github-actions@prestasiprima" -f ./github-actions-key

# Ini akan create 2 files:
# - github-actions-key (private) → Upload ke GitHub Secrets
# - github-actions-key.pub (public) → Add ke server
```

#### 2.2. Add Public Key ke Server

```bash
# SSH ke server
ssh user@your-server.com

# Add public key ke authorized_keys
cat >> ~/.ssh/authorized_keys << 'EOF'
# Paste isi github-actions-key.pub disini
ssh-ed25519 AAAAC3Nza... github-actions@prestasiprima
EOF

# Set permissions
chmod 600 ~/.ssh/authorized_keys
chmod 700 ~/.ssh
```

#### 2.3. Add Secrets ke GitHub Repository

1. Buka repository → **Settings** → **Secrets and variables** → **Actions**
2. Klik **New repository secret**, tambahkan:

| Secret Name | Value | Example |
|-------------|-------|---------|
| `SSH_PRIVATE_KEY` | Isi private key (`github-actions-key`) | `-----BEGIN OPENSSH PRIVATE KEY-----...` |
| `SERVER_USER` | Username SSH | `root` atau `www-data` |
| `SERVER_IP` | IP atau domain server | `123.45.67.89` |
| `APP_PATH` | Path aplikasi di server | `/var/www/prestasi-prima` |
| `APP_URL` | URL aplikasi | `prestasiprima.sch.id` |

**Cara copy private key:**

Windows:
```powershell
Get-Content .\github-actions-key | clip
```

Linux/Mac:
```bash
cat github-actions-key | pbcopy  # Mac
cat github-actions-key | xclip   # Linux
```

#### 2.4. Test GitHub Actions Workflow

File `.github/workflows/deploy.yml` sudah dibuat. Test dengan:

1. Commit & push changes:
```bash
git add .
git commit -m "Setup automated deployment"
git push origin main
```

2. Cek di GitHub → **Actions** tab
3. Lihat deployment logs

---

### Part 3: Manual Deployment (Git + SSH)

Jika tidak menggunakan GitHub Actions, deploy manual:

#### 3.1. Deploy via Script

```bash
# SSH ke server
ssh user@your-server.com

# Navigate ke aplikasi
cd /var/www/prestasi-prima

# Pull & deploy
git pull origin main
./deploy.sh
```

#### 3.2. Deploy via Remote Command

Dari komputer lokal:

```bash
ssh user@server.com "cd /var/www/prestasi-prima && git pull origin main && ./deploy.sh"
```

---

### Part 4: Sudoers Configuration (Jika Deploy User Bukan Root)

Jika GitHub Actions atau deploy user bukan root, tambahkan sudoers:

```bash
# Edit sudoers
sudo visudo

# Add lines (ganti 'deployer' dengan username deploy Anda):
deployer ALL=(ALL) NOPASSWD: /usr/bin/systemctl restart reverb
deployer ALL=(ALL) NOPASSWD: /usr/bin/systemctl reload php8.3-fpm
deployer ALL=(ALL) NOPASSWD: /usr/bin/systemctl reload nginx
deployer ALL=(ALL) NOPASSWD: /usr/bin/chown
deployer ALL=(ALL) NOPASSWD: /usr/bin/chmod
```

Save dan test:
```bash
sudo systemctl status reverb
```

---

### Part 5: Troubleshooting

#### Error: Permission Denied (publickey)

```bash
# Check SSH key
ssh -T git@github.com

# Jika gagal, check SSH config
cat ~/.ssh/config

# Add if needed:
Host github.com
  HostName github.com
  User git
  IdentityFile ~/.ssh/prestasi-prima-deploy
```

#### Error: Could not resolve hostname

```bash
# Check DNS
ping github.com

# Add to /etc/hosts jika perlu
echo "140.82.121.3 github.com" | sudo tee -a /etc/hosts
```

#### Git Pull Conflicts

```bash
# Reset local changes
git fetch origin
git reset --hard origin/main

# Or stash changes
git stash
git pull
git stash pop
```

#### Services Not Restarting

```bash
# Check service status
sudo systemctl status reverb
sudo systemctl status php8.3-fpm
sudo systemctl status nginx

# Restart manually
sudo systemctl restart reverb
sudo systemctl reload php8.3-fpm
sudo systemctl reload nginx
```

---

### Part 6: Monitoring & Logs

#### View Deployment Logs

```bash
# GitHub Actions logs
# Available in GitHub → Actions → Workflow run

# Server deployment logs
tail -f /var/log/prestasi-prima-deploy.log

# Application logs
tail -f /var/www/prestasi-prima/storage/logs/laravel.log

# Nginx error logs
tail -f /var/log/nginx/error.log
```

#### Health Check

```bash
# Check application
curl -I https://prestasiprima.sch.id

# Check database
php artisan migrate:status

# Check services
systemctl status reverb nginx php8.3-fpm
```

---

### Part 7: Rollback

Jika deployment bermasalah:

```bash
# SSH ke server
ssh user@server.com
cd /var/www/prestasi-prima

# View commits
git log --oneline -n 5

# Rollback ke commit sebelumnya
git reset --hard <commit-hash>

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Restart services
sudo systemctl restart reverb
sudo systemctl reload php8.3-fpm
```

---

## Quick Reference

### Deploy Commands

```bash
# Automated (GitHub Actions)
git push origin main  # Auto-deploy

# Manual SSH
ssh user@server "cd /var/www/prestasi-prima && git pull && ./deploy.sh"

# Interactive SSH
ssh user@server
cd /var/www/prestasi-prima
git pull origin main
./deploy.sh
```

### Useful Commands

```bash
# Check git status
git status
git log --oneline -n 10

# View deployment script
cat deploy.sh

# Test SSH connection
ssh -T git@github.com

# View secrets (GitHub)
gh secret list
```

---

## Security Best Practices

1. ✅ **Never commit private keys** to repository
2. ✅ **Use dedicated deploy keys** (minimal permissions)
3. ✅ **Rotate keys regularly** (every 6 months)
4. ✅ **Use strong SSH key types** (ed25519 > rsa)
5. ✅ **Limit sudo access** to specific commands only
6. ✅ **Enable 2FA** on GitHub account
7. ✅ **Use GitHub Environments** for approval workflow
8. ✅ **Monitor deployment logs** regularly

---

## Next Steps

1. [ ] Setup SSH keys di server
2. [ ] Add deploy key ke GitHub
3. [ ] Configure GitHub Actions secrets
4. [ ] Test manual git pull
5. [ ] Test automated deployment
6. [ ] Setup monitoring & alerts
7. [ ] Document deployment process
8. [ ] Train team on deployment procedure

---

**Support**: admin@prestasiprima.sch.id  
**Documentation**: http://localhost:3000
