#! /bin/sh

#crontab -l > /tmp/cron_tmpfile
#cat /tmp/crontab_conf > /tmp/cron_tmpfile
#crontab /tmp/cron_tmpfile 

sudo crontab -u pi -l > /var/www/e_reveil/script/tmp/cron_tmpfile
cat /var/www/e_reveil/script/tmp/crontab_conf > /var/www/e_reveil/script/tmp/cron_tmpfile
sudo crontab -u pi /var/www/e_reveil/script/tmp/cron_tmpfile 
