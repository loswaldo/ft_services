FROM alpine

RUN apk update && apk upgrade

RUN apk add mariadb-client mariadb openrc telegraf
RUN openrc && touch /run/openrc/softlevel

COPY setup.sh /
COPY wordpress.sql /
COPY my.cnf /etc/my.cnf
RUN chmod +x /setup.sh

COPY healthcheck.sh /
COPY telegraf.conf /etc/telegraf.conf
EXPOSE 3306
ENTRYPOINT sh /setup.sh