#! /usr/bin/python3
import pymysql
#from cron.cron_led_2 import *

db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )


####cron_led
H_led = "SELECT heures_id FROM led_heures "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(H_led)
#data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(H_led)
   # Fetch all the rows in a list of lists.
   led_heures = cursor.fetchall()
##   for row in led_heures:
##      led_id = row[0]
##      led_h = row[1]
      # Now print fetched result
##      print ("led_id = %s,heures_id = %s" % \
##         (row[0],row[1]))
      
      
except:
   print ("Error: unable to fetch data H_led")


led_H = (led_heures)

led_H_H=('/'.join([str(led_H)]))


M_led = "SELECT minutes_id FROM led_minutes "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(M_led)
#data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(M_led)
   # Fetch all the rows in a list of lists.
   led_minutes = cursor.fetchall()
##   for row in results:
##      led_id = row[0]
##      minutes_id = row[1]
      # Now print fetched result
##      print ("led_id = %s,minutes_id = %s" % \
##         (row[0],row[1]))
      
      
except:
   print ("Error: unable to fetch data M_led")


led_M = (led_minutes)
led_M_M=('/'.join([str(led_M)]))

J_led = "SELECT jours_id FROM led_jours"
#J_led = "SELECT * FROM led_jours"
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(J_led)
#data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(J_led)
   # Fetch all the rows in a list of lists.
   led_jours = cursor.fetchall()
##   for row in results:
##      led_id = row[0]
##      led_jours_id = row[1]
      # Now print fetched result
##      print ("led_id = %s,jours_id = %s" % \
##         (row[0],row[1]))
      
      
except mysql.connector.Error as err:
    print("Something went wrong: {}".format(err))
led_J=(led_jours)
led_J_J = ('/'.join([str(led_J)]))

##import pymysql 
##import shutil, os
##import tempfile
##from string import *
##db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )
##
##
##H_led = "SELECT * FROM led_heures "
### prepare a cursor object using cursor() method
##cursor = db.cursor()
##cursor.execute(H_led)
##data = cursor.fetchone()
### execute SQL query using execute() method.
##
##
##try:
##   # Execute the SQL command
##   cursor.execute(H_led)
##   # Fetch all the rows in a list of lists.
##   results = cursor.fetchall()
##   for row in results:
##      led_id = row[0]
##      heures_id = row[1]
##      # Now print fetched result
####      print ("led_id = %s,j = %s" % \
####         (row[0],row[1]))
####      
##      
##except:
##   print ("Error: unable to fetch data H_led")
##
##
##led_H =(row[1])
##led_H_H=('/'.join([str(led_H)]))
##
##M_led = "SELECT * FROM led_minutes "
### prepare a cursor object using cursor() method
##cursor = db.cursor()
##cursor.execute(M_led)
##data = cursor.fetchone()
### execute SQL query using execute() method.
##print(led_H)
##
##try:
##   # Execute the SQL command
##   cursor.execute(M_led)
##   # Fetch all the rows in a list of lists.
##   results = cursor.fetchall()
##   for row in results:
##      led_id = row[0]
##      heures_id = row[1]
##      # Now print fetched result
####      print ("led_id = %s,j = %s" % \
####         (row[0],row[1]))
####      
##      
##except:
##   print ("Error: unable to fetch data M_led")
##
##
##led_M = (row[1])
##led_M_M=('/'.join([str(led_M)]))
### disconnect from server
##
##J_led = "SELECT jours_id FROM led_jours"
###J_led = "SELECT * FROM led_jours"
### prepare a cursor object using cursor() method
##cursor = db.cursor()
##cursor.execute(J_led)
##data = cursor.fetchone()
### execute SQL query using execute() method.
##
##
##try:
##   # Execute the SQL command
##   cursor.execute(J_led)
##   # Fetch all the rows in a list of lists.
##   results = cursor.fetchall()
####   for row in results:
####     # led_id = row[0]
####      jours_id = row[1]
####      # Now print fetched result
######      print ("led_id = %s,j = %s" % \
####         (row[0],row[1]))
##      
      
##except mysql.connector.Error as err:
##    print("Something went wrong: {}".format(err))

##led_J = (results)
##led_J_J = ('/'.join([str(led_J)]))


db.close()


print(led_H, led_M, led_J)