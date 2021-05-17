if [ $(ps aux | grep vsftpd | grep -v grep | wc -l) == 0 ]; then
    exit 1
fi
if [ $(ps aux | grep telegraf | grep -v grep | wc -l) == 0 ]; then
    exit 1
fi