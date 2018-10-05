FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN amazon-linux-extras install nginx1.12 -y

COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/backend.conf /etc/nginx/conf.d/backend.conf

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["nginx", "-g", "daemon off;"]
