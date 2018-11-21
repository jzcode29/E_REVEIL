#! /bin/sh

#crontab -l > /tmp/crontab_edit
#cat /tmp/crontab_edit > /tmp/crontab_conf

sudo crontab -u pi -l  > /var/www/e_reveil/script/tmp/crontab_edit
cat /var/www/e_reveil/script/tmp/crontab_edit > /var/www/e_reveil/script/tmp/crontab_conf
touch /var/www/e_reveil/script/tmp/ crontab_conf_t
