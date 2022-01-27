FROM php:8.1-fpm

RUN apt-get update && \
    docker-php-ext-install pdo pdo_mysql
RUN apt-get install -y git

# INSTALL COMPOSER
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN alias composer='php /usr/bin/composer'

# Set working directory
WORKDIR /var/www/yarlykov
