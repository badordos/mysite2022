FROM php:8.1-fpm

RUN apt-get update && \
    docker-php-ext-install pdo pdo_mysql pcntl posix

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb \
    && echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongo.ini  \
    && pecl config-set php_ini $PHP_INI_DIR

RUN apt-get install -y git
RUN apt-get install -y nodejs npm

# INSTALL COMPOSER
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN alias composer='php /usr/bin/composer'

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
