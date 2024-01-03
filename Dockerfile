FROM mysql:8.2

COPY script.sql /docker-entrypoint-initdb.db

RUN apt-get update && apt-get install -y

EXPOSE 3306

FROM php:8.2-apache

COPY . /var/www/html

RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN composer install

USER www-data
