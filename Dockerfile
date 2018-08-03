FROM phusion/baseimage:latest

ENV HTTP_PROXY ''
ENV http_proxy ''

RUN apt-get update && apt-get install -y --no-install-recommends nginx
RUN curl -s "https://packagecloud.io/install/repositories/phalcon/stable/script.deb.sh" | bash
RUN apt-get install -y --no-install-recommends git zip unzip wget
RUN apt-get install -y --no-install-recommends php7.0-phalcon php php-xdebug php7.0 php7.0-cli php7.0-fpm php7.0-dom php7.0-mbstring php7.0-json php7.0-opcache composer
ADD conf/nginx-site /etc/nginx/sites-enabled/default
EXPOSE 80
WORKDIR /var/www/html

#ADD www /var/www/html

ENTRYPOINT service php7.0-fpm start && nginx -g "daemon off;"
