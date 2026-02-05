#!/bin/bash

################################################################################
# Quick Git + SSH Deployment Setup Script
# Run this on your LOCAL machine first
################################################################################

set -e

BLUE='\033[0;34m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${BLUE}========================================${NC}"
echo -e "${BLUE}Git + SSH Deployment Setup${NC}"
echo -e "${BLUE}========================================${NC}"
echo ""

# Check if ssh-keygen exists
if ! command -v ssh-keygen &> /dev/null; then
    echo -e "${YELLOW}⚠ ssh-keygen not found. Please install OpenSSH client${NC}"
    exit 1
fi

# Generate SSH key for GitHub Actions
echo -e "${BLUE}Step 1: Generating SSH key for GitHub Actions...${NC}"
if [ ! -f "./github-actions-deploy-key" ]; then
    ssh-keygen -t ed25519 -C "github-actions@prestasiprima" -f ./github-actions-deploy-key -N ""
    echo -e "${GREEN}✓ SSH key generated${NC}"
else
    echo -e "${YELLOW}⚠ Key already exists, skipping...${NC}"
fi

echo ""
echo -e "${BLUE}Step 2: Your Public Key (Add this to server ~/.ssh/authorized_keys)${NC}"
echo -e "${GREEN}========================================${NC}"
cat ./github-actions-deploy-key.pub
echo -e "${GREEN}========================================${NC}"

echo ""
echo -e "${BLUE}Step 3: Your Private Key (Add this to GitHub Secrets as SSH_PRIVATE_KEY)${NC}"
echo -e "${YELLOW}⚠ Keep this PRIVATE! Never commit to repository!${NC}"
echo -e "${GREEN}========================================${NC}"
cat ./github-actions-deploy-key
echo -e "${GREEN}========================================${NC}"

echo ""
echo -e "${BLUE}Step 4: Add these secrets to GitHub:${NC}"
echo ""
echo "1. Go to: GitHub → Settings → Secrets and variables → Actions"
echo "2. Add these secrets:"
echo ""
echo "   SSH_PRIVATE_KEY: (paste private key diatas)"
echo "   SERVER_USER: root (atau username SSH Anda)"
echo "   SERVER_IP: 123.45.67.89 (IP server production)"
echo "   APP_PATH: /var/www/prestasi-prima"
echo "   APP_URL: prestasiprima.sch.id"
echo ""

echo -e "${BLUE}Step 5: Run these commands on SERVER:${NC}"
echo ""
echo "ssh user@your-server.com << 'ENDSSH'"
echo "# Add public key to authorized_keys"
echo "mkdir -p ~/.ssh"
echo "chmod 700 ~/.ssh"
echo "cat >> ~/.ssh/authorized_keys << 'EOF'"
cat ./github-actions-deploy-key.pub
echo "EOF"
echo "chmod 600 ~/.ssh/authorized_keys"
echo "ENDSSH"
echo ""

echo -e "${GREEN}✓ Setup complete!${NC}"
echo ""
echo -e "${YELLOW}Next steps:${NC}"
echo "1. Add public key to server (command above)"
echo "2. Add secrets to GitHub repository"
echo "3. Push to main branch to test deployment"
echo "4. Check GitHub Actions → Workflow runs"
echo ""
echo -e "${GREEN}Keys saved to:${NC}"
echo "  - ./github-actions-deploy-key (private)"
echo "  - ./github-actions-deploy-key.pub (public)"
echo ""
echo -e "${YELLOW}⚠ Remember to delete these files after setup!${NC}"
