FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN amazon-linux-extras install nginx1.12 -y

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./backend.conf /etc/nginx/conf.d/backend.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
