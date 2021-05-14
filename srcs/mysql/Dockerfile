FROM alpine


RUN apk update && apk upgrade

RUN apk add mariadb-client mariadb openrc
RUN openrc && touch /run/openrc/softlevel

COPY setup.sh /
# COPY wordpress.sql /
COPY my.cnf /etc/my.cnf
RUN chmod +x /setup.sh

EXPOSE 3306
ENTRYPOINT sh /setup.sh