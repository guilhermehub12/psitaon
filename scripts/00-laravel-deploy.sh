#!/usr/bin/env bash
echo "Running composer"
composer self-update --2
composer install --no-dev --working-dir=/var/www/html

echo "generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

# Instalar NVM (Node Version Manager)
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash

# Carregar NVM
export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"

# Instalar Node.js e npm usando NVM
nvm install 20
nvm use 20

# Verificar a instalação do Node.js e npm
node -v
npm -v

# Instalar dependências do Node.js e construir assets
npm install
npm run build

# echo "Running migrations..."
php artisan migrate:fresh --seed --force

echo "done deploying"
php artisan serve --host 0.0.0.0 --port $PORT
