FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN amazon-linux-extras install nginx1.12 -y

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./backend.conf /etc/nginx/conf.d/backend.conf
COPY ./index.php /usr/share/nginx/html/index.php

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
