FROM php:8.2-cli

RUN apt update
RUN apt install -y libpq-dev && docker-php-ext-install pdo_pgsql

RUN pecl install redis && docker-php-ext-enable redis