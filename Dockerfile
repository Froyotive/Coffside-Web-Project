# Menggunakan base image PHP versi terbaru
FROM php:latest

# Menjalankan update dan instalasi dependencies
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libzip-dev \
        zip \
        unzip \
        git \
        curl \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql zip

# Set working directory ke direktori aplikasi Laravel
WORKDIR /var/www/html

# Menyalin file composer dan menjalankan instalasi dependencies
COPY composer.json ./
COPY composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --no-scripts --no-autoloader

# Menyalin seluruh kode aplikasi
COPY . .

# Generate key aplikasi Laravel
RUN php artisan key:generate

# Tambahkan perintah untuk menginstall Laravel Breeze
RUN COMPOSER_ALLOW_SUPERUSER=1 composer require laravel/breeze --dev

# Tambahkan perintah untuk menginstall package shoppingcart
RUN COMPOSER_ALLOW_SUPERUSER=1 composer require hardevine/shoppingcart

# Set permission agar writable oleh server
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Perintah untuk menjalankan server saat container dijalankan
CMD php artisan serve --host=0.0.0.0 --port=8000
