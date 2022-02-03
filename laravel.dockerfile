FROM composer:2 as composer_stage

WORKDIR /var/www
COPY ./addintel-test/composer.* ./

RUN composer install --ignore-platform-reqs --prefer-dist --no-progress --no-interaction --no-scripts

FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev zlib1g-dev \
    mariadb-client curl zip unzip libzip-dev libapache2-mod-fcgid

RUN docker-php-ext-install mysqli pdo pdo_mysql bcmath gd zip

RUN pecl install mcrypt

RUN docker-php-ext-enable mcrypt

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY ./addintel-test /var/www

WORKDIR /var/www
#RUN composer install -o

EXPOSE 9000

RUN echo "The API is ready!"
