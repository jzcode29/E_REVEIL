#! /usr/bin/python3

import pymysql
import time

time.sleep(2)

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
