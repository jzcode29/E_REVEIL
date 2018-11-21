#!/usr/bin/python3

from time import sleep
import subprocess
import RPi.GPIO as GPIO




# On choisit le GPIO  (pin 36) pour notre bouton
CHANNEL = 36

# On definit nos durees
long_press = 1.5
very_long_press = 2.5

# on met RPi.GPIO en mode notation BCM
GPIO.setmode(GPIO.BOARD)

# on initialise le GPIO 23 en mode entree
GPIO.setup(CHANNEL, GPIO.IN, pull_up_down=GPIO.PUD_UP)

# notre fonction off
def stop_wifi():
	subprocess.call(['sudo ifconfig wlan0 down "Arret de la wifi par bouton GPIO" &'], shell=True)

# notre fonction on
def start_wifi():
	subprocess.call(['sudo ifconfig wlan0 up "Allumage wifi par bouton GPIO" &'], shell=True)
	
# reboot raspbery
def reboot():
    subprocess.call(['sudo reboot "reboot du reveil" &'], shell=True)

# notre fonction de gestion du bouton
def system_button(CHANNEL):
	# cette variable servira a stocker le temps de pression
	button_press_timer = 0

	while True:
			if (GPIO.input(CHANNEL) == False) : # le bouton a ete presse...
				button_press_timer += 0.2 # ... on enregistre le temps que cela dure

			else: # le bouton a ete relache, on compte combien de temps cela a dure
				if (button_press_timer > very_long_press) :
					print ("very long press : ", button_press_timer)
					stop_wifi()

				elif (button_press_timer > long_press) :
					print ("long press : ", button_press_timer)
					start_wifi()

				elif (button_press_timer > 0.2):
					print ("short press : ", button_press_timer)
					

				button_press_timer = 0
			# on attend 0.2 secondes avant la boucle suivante afin de reduire la charge sur le CPU
			sleep(0.2)

# on met le bouton en ecoute par interruption, detection falling edge sur le canal choisi, et un debounce de 200 millisecondes
GPIO.add_event_detect(CHANNEL, GPIO.FALLING, callback=system_button, bouncetime=200)

# ici vous pouvez mettre du code qui sera execute normalement, sans influence de la fonction bouton
try:
	while True:
		# faites ce qui vous plait
		sleep (2)

# on reinitialise les ports GPIO en sortie de script
except KeyboardInterrupt:
    GPIO.cleanup()
