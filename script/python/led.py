import RPi.GPIO as GPIO        #Importation des modules
from db.led_db import *
import time
import sys


# disconnect from server

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD) #parametre des pin de la carte (BOARD)
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
GPIO.setup(36, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Une entree : le poussoir



GPIO.add_event_detect(36, GPIO.FALLING, callback=my_callback )

try:
    while True:
            for i in range (luminosite_fin_allumage):  # envoi le resulta en parametre 
                p.ChangeDutyCycle(i)
                time.sleep(tps)
            for i in range(luminosite_fin_allumage):
                p.ChangeDutyCycle(100-i)
                time.sleep(tps)
                
                
except KeyboardInterrupt:
        pass

p.stop()
db.close()
sys.exit()
GPIO.cleanup()
