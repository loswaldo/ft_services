FROM alpine


RUN apk update && apk upgrade
RUN apk add openrc nginx php-fpm php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysqli php-cli php-ldap php-zip php7-session php-curl php-iconv php-json php7-json fcgi

RUN openrc && touch /run/openrc/softlevel

RUN cd /var/www \
  && wget https://wordpress.org/latest.tar.gz \
  && tar -zxvf latest.tar.gz \
  && mv latest.tar.gz wordpress \
  && rm -rf latest.tar.gz

COPY wp-config.php /var/www/wordpress/wp-config.php
COPY nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /run/nginx

COPY setup.sh /setup.sh

COPY healthcheck.sh  /
COPY nginx.conf /

RUN chmod +x /setup.sh
EXPOSE 5050
ENTRYPOINT sh /setup.sh