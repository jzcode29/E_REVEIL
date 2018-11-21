import pymysql
import time

time.sleep(4)

db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )

####cron_led
H_son = "SELECT * FROM led "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(H_son)
data = cursor.fetchall()

print("Data Heure Led= ", data )

####cron_son
H_son = "SELECT * FROM audio_heures "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(H_son)
data = cursor.fetchall()

print("Data Heure audio= ", data )

db.close()
