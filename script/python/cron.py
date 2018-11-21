#!/usr/bin/python3

import os
import sys
import tempfile
from string import *
import time
import pymysql
#from  cron.cron_son_2 import *
##from cron.cron_led_2 import *
##from cron.cron_son_2 import *
HERE= os.path.dirname(sys.argv[0])
APPDIR = os.path.abspath(HERE)
sys.path.insert(0, APPDIR)
os.chdir(APPDIR)

db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil")
H_son = "SELECT heures_id FROM audio_heures"
cursor = db.cursor()
cursor.execute(H_son)
son_heures = cursor.fetchall()
son_H = (son_heures)
son_H_H = ('/'.join([str(son_H)]))
print(son_H_H)

M_son = "SELECT minutes_id FROM audio_minutes"
cursor = db.cursor()
cursor.execute(M_son)
son_minutes = cursor.fetchall()    
son_M = (son_minutes)
son_M_M = ('/'.join([str(son_M)]))

J_son = "SELECT jours_id FROM audio_jours"
cursor = db.cursor()
cursor.execute(J_son)
son_jours = cursor.fetchall()   
son_J = (son_jours)
son_J_J = ('/'.join([str(son_J)]))
db.close()
db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil")
H_led = "SELECT heures_id FROM led_heures"
cursor = db.cursor()
cursor.execute(H_led)
led_heures = cursor.fetchall()
led_H = (led_heures)
led_H_H = ('/'.join([str(led_H)]))
print(led_H_H)

M_led = "SELECT minutes_id FROM led_minutes"
cursor = db.cursor()
cursor.execute(M_led)
led_minutes = cursor.fetchall()    
led_M = (led_minutes)
led_M_M = ('/'.join([str(led_M)]))

J_led = "SELECT jours_id FROM led_jours"
cursor = db.cursor()
cursor.execute(J_led)
led_jours = cursor.fetchall()   
led_J = (led_jours)
led_J_J = ('/'.join([str(led_J)]))
db.close()


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
time.sleep(4)    
##with open("/var/www/e_reveil/script/tmp/crontab_conf_t", 'a+') as file:
##    text = file.read()
##    file.write(''.join([str(m_led)]))
##    file.write(" ")
##    file.write(''.join([str(h_led)]))
##    file.write(" ")
##    file.write("* * ")
##    file.write(''.join([str(j_led)]))
##    file.write(" ")
##    file.write(cron_led)
##    file.write(''.join([str(m_son)]))
##    file.write(" ")
##    file.write(''.join([str(h_son)]))
##    file.write(" ")
##    file.write("* * ")
##    file.write(''.join([str(j_son)]))
##    file.write(" ")
##    file.write(cron_son)
#On insère la commande du fichier temp dans la crontab :
os.system('sh /var/www/e_reveil/script/sbin/edit_cron.sh')
#Je supprime le fichier temporaire

#########time.sleep(2)
#os.remove('/var/www/e_reveil/script/tmp/crontab_conf_t')
os.remove('/var/www/e_reveil/script/tmp/crontab_conf')
os.remove('/var/www/e_reveil/script/tmp/cron_tmpfile')
os.remove('/var/www/e_reveil/script/tmp/crontab_edit')
#os.system('sh /var/www/e_reveil/script/sbin/exec_cron_2.sh')
#db.close()


