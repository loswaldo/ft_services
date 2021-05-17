FROM alpine

RUN apk update && apk upgrade

RUN apk add openrc vsftpd openssl telegraf
RUN openrc && touch /run/openrc/softlevel

RUN echo "root:root" | chpasswd

RUN printf "\n\n\n\n\n\n\n\n" | openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/vsftpd.pem -out /etc/ssl/private/vsftpd.pem

COPY setup.sh /
COPY healthcheck.sh /
COPY vsftpd.conf /etc/vsftpd/vsftpd.conf
RUN chmod +x /setup.sh

COPY telegraf.conf /etc/telegraf.conf
EXPOSE 21 20 30000
ENTRYPOINT sh /setup.sh