FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN set -x && \
  amazon-linux-extras install php7.2 -y && \
  yum install -y php-devel php-opcache php-xml php-mbstring

COPY ./php.ini /etc/php.ini
COPY ./www.conf /etc/php-fpm.d/www.conf
COPY ./10-opcache.ini /etc/php.d/10-opcache.ini

EXPOSE 9000
CMD ["php-fpm"]
