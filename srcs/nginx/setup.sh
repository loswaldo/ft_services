#!/bin/sh
rc-service telegraf start
nginx -g "daemon off;"