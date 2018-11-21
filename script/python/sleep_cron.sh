#! /bin/sh
sleep 5
su pi
cd /var/www/e_reveil/script/python
python3 edit_cron_ok.py >> /tmp/log 2>&1
edit_cron.sh >> /tmp/log 2>&1
touch test1
