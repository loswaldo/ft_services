FROM alpine

RUN apk update && apk upgrade

RUN apk add telegraf influxdb openrc
RUN openrc && touch /run/openrc/softlevel

COPY setup.sh /
RUN chmod +x /setup.sh
COPY telegraf.conf /etc/telegraf.conf

COPY healthcheck.sh /
RUN chmod +x /healthcheck.sh
EXPOSE 8086
ENTRYPOINT sh /setup.sh