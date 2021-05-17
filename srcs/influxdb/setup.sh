#!/bin/sh

rc-service telegraf start

/usr/sbin/influxd & 

sleep 15
echo 'create database telegraf' | influx
echo "create user telegraf with password 'telegraf'" | influx
echo 'grant all on telegraf to telegraf' | influx

sleep infinity