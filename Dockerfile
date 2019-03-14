FROM php:7.2-cli
RUN apt-get update && apt-get install libcurl4-openssl-dev
RUN docker-php-source extract \
    && docker-php-ext-install -j$(nproc) curl \
    && docker-php-source delete
