# syntax=docker/dockerfile:1

# =============================================================
# Stage 1 — Build frontend assets (Vite / Tailwind v4)
# =============================================================
FROM node:22-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY . .
RUN npm run build


# =============================================================
# Stage 2 — Application runtime (PHP 8.4 + Nginx + Supervisor)
# =============================================================
FROM php:8.4-fpm-alpine AS app

# --- System packages & PHP extensions -----------------------
# install-php-extensions resolves all system libs automatically.
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

RUN apk add --no-cache nginx supervisor \
    && install-php-extensions \
        pdo_mysql \
        bcmath \
        gd \
        zip \
        exif \
        pcntl \
        intl \
        opcache

WORKDIR /var/www/html

# --- PHP config ---------------------------------------------
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini

# --- Composer dependencies (cached layer) -------------------
COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-scripts \
        --no-autoloader \
        --prefer-dist \
        --no-interaction \
        --no-progress

# --- Application source --------------------------------------
COPY . .

# Bring in the compiled assets from the frontend stage.
COPY --from=frontend /app/public/build ./public/build

# Finish composer: generate optimized autoloader + run discovery.
RUN composer install \
        --no-dev \
        --optimize-autoloader \
        --no-interaction \
        --no-progress \
    && composer clear-cache

# --- Nginx / Supervisor / entrypoint ------------------------
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# --- Permissions --------------------------------------------
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
