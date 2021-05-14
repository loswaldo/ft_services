FROM alpine


RUN apk update && apk upgrade
RUN apk add openrc nginx php-fpm php-common php-mbstring php-xmlrpc php-soap php-gd php-xml php-intl php-mysqli php-cli php-ldap php-zip php7-session php-curl php-iconv php-json php7-json fcgi

RUN openrc && touch /run/openrc/softlevel

RUN cd /var/www \
  && wget https://files.phpmyadmin.net/phpMyAdmin/5.1.0/phpMyAdmin-5.1.0-all-languages.tar.gz \
  && tar -zxvf phpMyAdmin-5.1.0-all-languages.tar.gz \
  && mv phpMyAdmin-5.1.0-all-languages phpmyadmin \
  && rm -rf phpMyAdmin-5.1.0-all-languages.tar.gz

COPY config.inc.php /var/www/phpmyadmin/config.inc.php
COPY nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /run/nginx

COPY setup.sh /setup.sh

COPY healthcheck.sh  /
COPY nginx.conf /

RUN chmod +x /setup.sh
EXPOSE 5000
ENTRYPOINT sh /setup.sh