#!/bin/sh
set -e

cd /var/www/html

echo "[entrypoint] Starting deployment tasks..."

# --- APP_KEY guard -------------------------------------------
if [ -z "${APP_KEY}" ]; then
    echo "[entrypoint] ERROR: APP_KEY is not set."
    echo "             Generate one locally with 'php artisan key:generate --show'"
    echo "             and add it to the environment variables in Coolify."
    exit 1
fi

# --- Wait for the database to accept connections -------------
echo "[entrypoint] Waiting for database (${DB_HOST}:${DB_PORT})..."
tries=0
until php artisan tinker --execute="DB::connection()->getPdo();" >/dev/null 2>&1 || [ "$tries" -ge 30 ]; do
    tries=$((tries + 1))
    echo "[entrypoint]   ...database not ready yet (attempt ${tries}/30)"
    sleep 2
done

# --- Run migrations ------------------------------------------
echo "[entrypoint] Running migrations..."
php artisan migrate --force

# --- Storage symlink (for uploaded images) -------------------
if [ ! -L public/storage ]; then
    echo "[entrypoint] Linking storage..."
    php artisan storage:link || true
fi

# --- Cache config / routes / views ---------------------------
echo "[entrypoint] Caching config, routes and views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# --- Ensure writable paths -----------------------------------
chown -R www-data:www-data storage bootstrap/cache

echo "[entrypoint] Ready. Handing over to: $*"
exec "$@"
