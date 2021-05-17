FROM alpine


RUN apk update && apk upgrade

RUN apk add nginx openssl telegraf openrc
RUN openrc && touch /run/openrc/softlevel

# RUN echo "root:root" | chpasswd
COPY nginx.conf /etc/nginx/nginx.conf


RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/loswaldo.key \
    -out /etc/ssl/loswaldo.crt -subj "/C=US/ST=Utah/L=Lehi/O=Your Company, Inc./OU=IT/CN=yourdomain.com"

RUN mkdir -p /run/nginx

COPY setup.sh /setup.sh
COPY healthcheck.sh /
COPY telegraf.conf /etc/telegraf.conf
RUN chmod +x /setup.sh
EXPOSE 80 443
ENTRYPOINT sh /setup.sh