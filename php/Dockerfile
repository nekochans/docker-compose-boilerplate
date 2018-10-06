FROM php:7.2.10-fpm-alpine

LABEL maintainer="https://github.com/keitakn"

RUN set -x && \
  apk update && \
  apk add --no-cache libxml2 libxml2-dev curl curl-dev autoconf $PHPIZE_DEPS && \
  docker-php-ext-install opcache mysqli pdo pdo_mysql xml mbstring curl session tokenizer json && \
  pecl install xdebug && \
  docker-php-ext-enable xdebug && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

COPY config/php.ini /usr/local/etc/php/php.ini
COPY config/docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini
COPY config/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
