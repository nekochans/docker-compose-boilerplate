FROM amazonlinux

LABEL maintainer="https://github.com/nekochans"

RUN yum update -y && \
  amazon-linux-extras install nginx1.12 -y

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
