#!/bin/sh

rc-service telegraf start
/usr/sbin/influxd

sleep infinity