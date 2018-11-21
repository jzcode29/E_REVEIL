#!/usr/bin/python3

import os
import sys
import tempfile
import pymysql
from string import *
import time
#from  cron.cron_son_2 import *
from cron.cron_led_2 import *
from cron.cron_son_2 import *
HERE= os.path.dirname(sys.argv[0])
APPDIR = os.path.abspath(HERE)
sys.path.insert(0, APPDIR)
os.chdir(APPDIR)

#########time.sleep(4)

os.system('sh /var/www/e_reveil/script/sbin/reload_cron.sh')
os.system('sh /var/www/e_reveil/script/sbin/crontab_back.sh')
#########time.sleep(6)
#On créé une commande cron :
cron_son_M = son_M
cron_son_H = son_H
##cron_jour_son = j_son
j_son = son_J_J
j_son = j_son.replace('(','', 8)
j_son = j_son.replace(')','', 8)
j_son = j_son.replace(',','', 8)
j_son = j_son.replace(' ',',', 8)
m_son = son_M_M
m_son = m_son.replace('(','', 8)
m_son = m_son.replace(')','', 8)
m_son = m_son.replace(',','', 8)
m_son = m_son.replace(' ',',', 8)
h_son = son_H_H
h_son = h_son.replace('(','', 8)
h_son = h_son.replace(')','', 8)
h_son = h_son.replace(',','', 8)
h_son = h_son.replace(' ',',', 8)
cron_son = "/var/www/e_reveil/script/sbin/cron_son.sh >> /var/www/e_reveil/script/tmp/log-test 2>&1\n" #Ne pas oublier \n à la fin pour toute commande !
cron_led_M = led_M_M
cron_led_H = led_H_H
j_led = led_J_J
j_led = j_led.replace('(','', 8)
j_led = j_led.replace(')','', 8)
j_led = j_led.replace(',','', 8)
j_led = j_led.replace(' ',',', 8)
h_led = led_H_H
h_led = h_led.replace('(','', 8)
h_led = h_led.replace(')','', 8)
h_led = h_led.replace(',','', 8)
h_led = h_led.replace(' ',',', 8)
m_led = led_M_M
m_led = m_led.replace('(','', 8)
m_led = m_led.replace(')','', 8)
m_led = m_led.replace(',','', 8)
m_led = m_led.replace(' ',',', 8)
cron_led = "/var/www/e_reveil/script/sbin/cron_led.sh >> /var/www/e_reveil/script/tmp/log-test 2>&1\n"
###On ajoute la commande de planification à la fin de crontab_temp    
with open("/var/www/e_reveil/script/tmp/crontab_conf", 'a+') as file:
    text = file.read()
    file.write(''.join([str(m_led)]))
    file.write(" ")
    file.write(''.join([str(h_led)]))
    file.write(" ")
    file.write("* * ")
    file.write(''.join([str(j_led)]))
    file.write(" ")
    file.write(cron_led)
    file.write(''.join([str(m_son)]))
    file.write(" ")
    file.write(''.join([str(h_son)]))
    file.write(" ")
    file.write("* * ")
    file.write(''.join([str(j_son)]))
    file.write(" ")
    file.write(cron_son)
#On insère la commande du fichier temp dans la crontab :
os.system('sh /var/www/e_reveil/script/sbin/edit_cron.sh')
#Je supprime le fichier temporaire
print(m_led, h_led)
#########time.sleep(2)
os.remove('/var/www/e_reveil/script/tmp/crontab_conf')
os.remove('/var/www/e_reveil/script/tmp/cron_tmpfile')
os.remove('/var/www/e_reveil/script/tmp/crontab_edit')
#db.close()



