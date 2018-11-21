import pymysql

db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )


####cron_son
H_son = "SELECT heures_id FROM led_heures "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(H_son)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(H_son)
   # Fetch all the rows in a list of lists.
   audio_heures = cursor.fetchall()
##   for row in audio_heures:
##      audio_id = row[0]
##      audio_h = row[1]
      # Now print fetched result
##      print ("audio_id = %s,heures_id = %s" % \
##         (row[0],row[1]))
      
      
except:
   print ("Error: unable to fetch data H_son")


son_H = (audio_heures)

son_H_H=('/'.join([str(son_H)]))


M_son = "SELECT minutes_id FROM audio_minutes "
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(M_son)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(M_son)
   # Fetch all the rows in a list of lists.
   audio_minutes = cursor.fetchall()
##   for row in results:
##      audio_id = row[0]
##      minutes_id = row[1]
      # Now print fetched result
##      print ("audio_id = %s,minutes_id = %s" % \
##         (row[0],row[1]))
      
      
except:
   print ("Error: unable to fetch data M_son")


son_M = (audio_minutes)
son_M_M=('/'.join([str(son_M)]))

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
   son_jours = cursor.fetchall()
##   for row in results:
##      audio_id = row[0]
##      audio_jours_id = row[1]
      # Now print fetched result
##      print ("audio_id = %s,jours_id = %s" % \
##         (row[0],row[1]))
      
      
except:
   print ("Error: unable to fetch data J_son")
son_J=(son_jours)
son_J_J = ('/'.join([str(son_J)]))
