FROM php:8.3.19-cli-alpine3.21



# Installation des dépendances et extensions PHP
RUN apk add --no-cache \
    icu-dev \
    postgresql-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install \
    intl \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    zip && addgroup -g 20003 kevin && \
    adduser -D -u 20003 -G kevin kevin && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
    

USER kevin

WORKDIR /api

EXPOSE 8000

CMD composer install && php artisan key:generate && php artisan migrate:fresh && php artisan serve --host=0.0.0.0 --port=8000

# composer create-project laravel/laravel /api
