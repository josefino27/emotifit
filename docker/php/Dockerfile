FROM php:8.0-fpm
RUN apt-get update -y
RUN apt-get purge -f libxml2-dev -y
RUN apt-get clean -y
RUN apt-get install libxml2 libxml2-dev  -y
RUN apt-get install -y  \
            git \
            nano \
            libzip-dev \
            libc-client-dev \
            libkrb5-dev \
            libpng-dev \
            libjpeg-dev \
            libwebp-dev \
            libfreetype6-dev \
            libkrb5-dev \
            libicu-dev \
            zlib1g-dev \
            zip \
            ffmpeg \
            libmemcached11 \
            libmemcachedutil2 \
            build-essential \
            libmemcached-dev \
            gnupg2 \
            libpq-dev \
            libpq5 \
            libz-dev

RUN apt-get update
RUN docker-php-ext-configure gd \
    --with-webp=/usr/include/ \
    --with-freetype=/usr/include/ \
    --with-jpeg=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-configure imap \
    --with-kerberos \
    --with-imap-ssl
RUN docker-php-ext-install imap
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install exif
RUN docker-php-ext-install fileinfo
RUN docker-php-ext-install opcache
RUN docker-php-ext-install soap
RUN pecl install xdebug-3.1.6
RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
chmod +x wp-cli.phar && \
mv wp-cli.phar /usr/local/bin/wp

## Install NodeJS 14
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get -y install libtool automake autoconf nasm dh-autoreconf python3    

RUN apt-get -y install nodejs

# Clean up apt
RUN apt-get clean && \
rm -r /var/lib/apt/lists/* && \
# Extract php source files files for use downstream
tar -C "/usr/src" -xvf "/usr/src/php.tar.xz" && \
mv /usr/src/php-$PHP_VERSION /usr/src/php

WORKDIR /var/www/html

ARG DOCKER_GITLAB_TOKEN

RUN composer config --global --auth gitlab-token.gitlab.com $DOCKER_GITLAB_TOKEN


ENV COMPOSER_ALLOW_SUPERUSER 1


COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini


