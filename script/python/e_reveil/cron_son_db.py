import pymysql
import shutil, os
import tempfile
from string import *
db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )


H_son = "SELECT * FROM audio_heures "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(H_son)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(H_son)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      audio_id = row[0]
      heures_id = row[1]
      # Now print fetched result
##      print ("led_id = %s,j = %s" % \
##         (row[0],row[1]))
##      
      
except:
   print ("Error: unable to fetch data H_son")


son_H = (row[1])
son_H_H=('/'.join([str(son_H)]))

M_son = "SELECT * FROM audio_minutes "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(M_son)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(M_son)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      led_id = row[0]
      heures_id = row[1]
      # Now print fetched result
##      print ("led_id = %s,j = %s" % \
##         (row[0],row[1]))
##      
      
except:
   print ("Error: unable to fetch data M_son")


son_M = (row[1])
son_M_M=('/'.join([str(son_M)]))
# disconnect from server

J_son = "SELECT jours_id FROM audio_jours"
#J_led = "SELECT * FROM led_jours"
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(J_son)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(J_son)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
##   for row in results:
##     # led_id = row[0]
##      jours_id = row[1]
##      # Now print fetched result
####      print ("led_id = %s,j = %s" % \
##         (row[0],row[1]))
##      
      
except:
   print ("Error: unable to fetch data J_son")

son_J = (results)
son_J_J = ('/'.join([str(son_J)]))

print(son_M)
db.close()


