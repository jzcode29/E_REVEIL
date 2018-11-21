#! /usr/bin/python3
import pdb
import shutil, os
import tempfile
from e_reveil.cron_led_db import *
from e_reveil.cron_son_db import *
##from cron_led_db import *
##from cron_son_db import *
##import cron_led_db
##import cron_son_db

#On créé un fichier temporaire crontab_temp à partir du fichier précédemment créé:
os.system('sh /var/www/e_reveil/script/sbin/reload_cron.sh')
os.system('sh /var/www/e_reveil/script/sbin/crontab_back.sh')
#os.system'sh /sbin/crontab_dump.sh')
#shutil.copyfile('/tmp/crontab_edit', '/tmp/crontab_conf')


#On créé une commande cron :
cron_son_M = son_M
cron_son_H = son_H
##cron_jour_son = j_son
j_son = son_J_J
j_son = j_son.replace('(','', 8)
j_son = j_son.replace(')','', 8)
j_son = j_son.replace(',','', 8)
j_son = j_son.replace(' ',',', 8)
cron_son = "/var/www/e_reveil/script/sbin/cron_son.sh\n" #Ne pas oublier \n à la fin pour toute commande !
cron_led_M = led_M
cron_led_H = led_H
j_led = led_J_J
j_led = j_led.replace('(','', 8)
j_led = j_led.replace(')','', 8)
j_led = j_led.replace(',','', 8)
j_led = j_led.replace(' ',',', 8)
cron_led = "/var/www/e_reveil/script/sbin/cron_led.sh\n"
###On ajoute la commande de planification à la fin de crontab_temp
with open("/var/www/e_reveil/script/tmp/crontab_conf", 'a+') as file:
    text = file.read()
    file.write(''.join([str(led_M)]))
    file.write(" ")
    file.write(''.join([str(led_H)]))
    file.write(" ")
    file.write("* * ")
    file.write(''.join([str(j_led)]))
    file.write(" ")
    file.write(cron_led)
    file.write(''.join([str(son_M)]))
    file.write(" ")
    file.write(''.join([str(son_H)]))
    file.write(" ")
    file.write("* * ")
    file.write(''.join([str(j_son)]))
    file.write(" ")
    file.write(cron_son)
#On insère la commande du fichier temp dans la crontab :
os.system('sh /var/www/e_reveil/script/sbin/edit_cron.sh')
#Je supprime le fichier temporaire
os.remove('/var/www/e_reveil/script/tmp/crontab_conf')
os.remove('/var/www/e_reveil/script/tmp/cron_tmpfile')
os.remove('/var/www/e_reveil/script/tmp/crontab_edit')
