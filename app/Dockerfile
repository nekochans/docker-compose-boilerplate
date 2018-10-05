FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN set -x && \
  amazon-linux-extras install php7.2 -y && \
  yum install -y php-devel php-opcache php-xml php-mbstring

COPY config/php.ini /etc/php.ini
COPY config/www.conf /etc/php-fpm.d/www.conf
COPY config/10-opcache.ini /etc/php.d/10-opcache.ini

EXPOSE 9000
CMD ["php-fpm"]
