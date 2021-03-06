#!/bin/sh

rc-service telegraf start
rc-service mariadb setup
rc-service mariadb start \
&& mysql -e "CREATE DATABASE IF NOT EXISTS wordpress" \
&& mysql -e "CREATE USER IF NOT EXISTS 'user'@'%' identified by 'user';" \
&& mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'user'@'%';" \
&& mysql -e "FLUSH PRIVILEGES" \
&& mysql wordpress < /wordpress.sql

sleep infinity