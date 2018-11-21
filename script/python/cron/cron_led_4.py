#! /usr/bin/python3

import pymysql
import time

time.sleep(2)
db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil")
t_led = "SELECT heures_id FROM led_heures"
cursor = db.cursor()
cursor.execute(t_led)
led_tt = cursor.fetchall()
led_t = (led_tt)
led_t_t = ('/'.join([str(led_t)]))

p_led = "SELECT minutes_id FROM led_minutes"
cursor = db.cursor()
cursor.execute(p_led)
led_pp = cursor.fetchall()    
led_p = (led_pp)
led_p_p = ('/'.join([str(led_p)]))

x_led = "SELECT jours_id FROM led_jours"
cursor = db.cursor()
cursor.execute(x_led)
led_xx = cursor.fetchall()   
led_x = (led_xx)
led_x_x = ('/'.join([str(led_x)]))
db.close()

time.sleep(4)
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