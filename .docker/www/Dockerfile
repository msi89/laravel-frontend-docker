FROM php:7.4-fpm


ADD ./.docker/www/php.conf /usr/local/etc/php-fpm.d/www.conf


RUN groupadd -g 1000 admin05ru
RUN useradd -d /var/www/html -s /bin/bash -u 1000 -g 1000 admin05ru
RUN mkdir -p /var/www/html
RUN chown -R admin05ru:admin05ru /var/www/html


WORKDIR /var/www/html



# Starting from scratch
RUN apt-get clean
RUN apt-get -y autoremove
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Dependencies
RUN apt-get update -y

# Zip
RUN apt-get install -y libzip-dev git zip unzip && \
    docker-php-ext-install zip

# Curl
RUN apt-get install -y libcurl3-dev curl && docker-php-ext-install curl

# GD
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# ImageMagick
RUN apt-get install -y imagemagick && apt-get install -y --no-install-recommends libmagickwand-dev
RUN pecl install imagick && docker-php-ext-enable imagick

# PostgreSQL
RUN apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# BC Math
RUN docker-php-ext-install bcmath

# Human Language and Character Encoding Support
RUN apt-get install -y zlib1g-dev libicu-dev g++
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Custom php.ini config
COPY ./.docker/www/php.ini /usr/local/etc/php/php.ini

# Composer installation
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN chmod 0755 /usr/bin/composer

# NodeJs installation
RUN apt-get install -y gnupg2
# Removing /var/lib/apt/lists worked
RUN rm -rf /var/lib/apt/lists/ && curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install nodejs -y

# Clean up
RUN apt-get clean
RUN apt-get -y autoremove
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
