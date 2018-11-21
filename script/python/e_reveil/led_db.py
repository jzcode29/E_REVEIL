import pymysql


# Open database connection
def db_led():
    db = pymysql.connect("localhost","pi","Teamgeekdu13","e_reveil" )
    sql = "SELECT * FROM led"
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
          duree_progression_allumage = row[1]
          luminosite_fin_allumage = row[2]
      # Now print fetched result
##      print ("id = %s,d = %s,l= %s" % \
##         (row[0],row[1],row[2]))
          tps = (row[1] / 100)
          print (tps)
          db.close()
    except:
       print ("Error: unable to fetch data db_led")

print(row[2])


# disconnect from server

