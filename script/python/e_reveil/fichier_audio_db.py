import pymysql

# Open database connection
db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )


sql = "SELECT * FROM audio"
# prepare a cursor object using cursor() method
cursor = db.cursor()
cursor.execute(sql)
data = cursor.fetchone()
# execute SQL query using execute() method.


try:
   # Execute the SQL command
   cursor.execute(sql)
   # Fetch all the rows in a list of lists.
   results = cursor.fetchall()
   for row in results:
      id = row[0]
      fichier_audio_id = row[1]
      heure_minute_secondes = row[2]
      volume_maximum = row[3]
      # Now print fetched result
##      print ("id = %s,f = %s,t= %s,s = %s" % \
##         (row[0],row[1],row[2],row[3]))
except:
   print ("Error: unable to fetch data")

# disconnect from server
db.close()