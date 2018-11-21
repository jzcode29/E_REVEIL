#! /usr/bin/python3

import pymysql
import time

time.sleep(2)

db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil")
t_son = "SELECT heures_id FROM audio_heures"
cursor = db.cursor()
cursor.execute(t_son)
son_tt = cursor.fetchall()
son_t = (son_tt)
son_t_t = ('/'.join([str(son_t)]))
print(son_t_t)

p_son = "SELECT minutes_id FROM audio_minutes"
cursor = db.cursor()
cursor.execute(p_son)
son_pp = cursor.fetchall()    
son_p = (son_pp)
son_p_p = ('/'.join([str(son_p)]))

x_son = "SELECT jours_id FROM audio_jours"
cursor = db.cursor()
cursor.execute(x_son)
son_xx = cursor.fetchall()   
son_x = (son_xx)
son_x_x = ('/'.join([str(son_x)]))
db.close()

time.sleep(4)

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