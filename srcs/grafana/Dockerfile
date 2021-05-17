FROM alpine

RUN apk update && apk upgrade

RUN apk add grafana openrc libgcc telegraf
RUN openrc && touch /run/openrc/softlevel

COPY setup.sh /
RUN chmod +x /setup.sh

WORKDIR /usr/share/grafana
COPY grafana.db ./data/grafana.db

COPY telegraf.conf /etc/telegraf.conf
COPY healthcheck.sh /
EXPOSE 3000
ENTRYPOINT sh /setup.sh