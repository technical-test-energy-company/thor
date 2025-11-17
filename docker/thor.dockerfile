# setup
FROM php:8.4-apache

WORKDIR /var/www/html/thor
COPY . .

# install dependencies
RUN apt update
RUN apt install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libzip-dev \
    zlib1g-dev

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    zip

# install datadog
RUN curl -LO https://github.com/DataDog/dd-trace-php/releases/latest/download/datadog-setup.php
RUN php datadog-setup.php --php-bin=all --enable-appsec --enable-profiling

# clear cache
RUN apt clean && rm -rf /var/lib/apt/lists/*

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH="$PATH:/root/.composer/vendor/bin:/root/.config/composer/vendor/bin"

# install laravel
RUN composer global require laravel/installer
