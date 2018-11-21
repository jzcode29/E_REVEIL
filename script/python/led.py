import RPi.GPIO as GPIO        #Importation des modules
import pymysql
import time
import sys

# Open database connection

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
          
except:
    print ("Error: unable to fetch data db_led")
tps = (row[1] / 100)

db.close()


# disconnect from server

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) #parametre des pin de la carte (BOARD)
#GPIO.setmode(GPIO.BOARD)
GPIO.setup(12, GPIO.OUT) #parametre pin 12 led en output
p = GPIO.PWM(12, 100)        #parametre du PWM sur pin 12 avec X%
p.start(0.0) #start a 0.0 pour l'intensité


## fonction du gpio pour le bouton poussoir
def my_callback(channel):
    if GPIO.input(channel):
        print('GPIO %s 0->1' %channel)
        p.stop()
        GPIO.cleanup()
        sys.exit()

    else:
        print('GPIO %s 1->0' %channel)
        p.stop()
        GPIO.cleanup()
        sys.exit()

    
GPIO.setmode(GPIO.BOARD)   # La numerotation choisie
GPIO.setup(32, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Une entree : le poussoir



GPIO.add_event_detect(32, GPIO.FALLING, callback=my_callback )

try:
    while True:
            for i in range (row[2]):  # envoi le resulta en parametre 
                p.ChangeDutyCycle(i)
                time.sleep(tps)
            for i in range(row[2]):
                p.ChangeDutyCycle(100-i)
                time.sleep(tps)
                
                
except KeyboardInterrupt:
        pass

p.stop()
db.close()
sys.exit()
GPIO.cleanup()
