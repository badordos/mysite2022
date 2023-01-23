FROM php:8.1-fpm

RUN apt-get update --fix-missing && \
    docker-php-ext-install pdo pdo_mysql pcntl posix
#todo OPCACHE
RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb \
    && echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongo.ini  \
    && pecl config-set php_ini $PHP_INI_DIR

RUN apt-get install -y git

# INSTALL COMPOSER
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN alias composer='php /usr/bin/composer'

#INSTALL ZIP
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip

# Set working directory
WORKDIR /var/www/yarlykov

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/yarlykov

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/yarlykov

# Change current user to www
USER www
