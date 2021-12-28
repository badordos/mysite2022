FROM php:8.1-fpm

RUN apt-get update\
    && docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/yarlykov
