from tkinter import *
import os.path, tkinter.filedialog
import glob 
from os.path import basename, splitext
from tkinter import *			
from time import gmtime, strftime, sleep ,time
import pygame
from pygame.locals import *
import os, sys
import RPi.GPIO as GPIO
from db.fichier_audio_db import *




HERE= os.path.dirname(sys.argv[0])
APPDIR = os.path.abspath(HERE)
sys.path.insert(0, APPDIR)
os.chdir(APPDIR)

db_audio = ('/'.join([str(row[1])]))
db_vol = row[2]

dir=("/var/www/e_reveil/web/Uploads/Mp3/")
son =((dir)+(db_audio)+".mp3")
volume = (db_vol)
pygame.init()
pygame.mixer.music.load(son,)
pygame.mixer.music.play()

##GPIO.setmode(GPIO.BOARD)   # La numerotation choisie
##GPIO.setup(36, GPIO.IN)  # Une entree : le poussoir
GPIO.setmode(GPIO.BOARD)   # La numerotation choisie
GPIO.setup(36, GPIO.IN, pull_up_down=GPIO.PUD_UP)  # Une entree : le poussoir



channel = 36

def my_callback(channel):
  if GPIO.input(channel):
    print('GPIO %s 0->1' %channel)
    pygame.mixer.music.stop()
    root.destroy()
    sys.exit()

  else:
    print('GPIO %s 1->0' %channel)
    pygame.mixer.music.stop()
    root.destroy()
    sys.exit()
    




  
GPIO.add_event_detect(36, GPIO.BOTH, callback=my_callback)
GPIO.cleanup()
def vol():
    root.after(1,vol)
    vol_1=Buttonvolume.get()
    pygame.mixer.music.set_volume(vol_1*.01)
    
    

def Arret():
    pygame.mixer.music.stop()
    root.destroy()
    sys.exit()

root = Tk()
root.title("Musique du reveil")
root.configure
root.after(1,vol)
label= Label(root, text="clique sur le bouton pour stoper la musique", bg="red").pack()

bouton = Button(root, text="Stop", command=Arret).pack() 
Buttonvolume=Scale(root, from_=100, to=0, variable=vol)
Buttonvolume.set(volume)
Buttonvolume.pack()
root.mainloop()
sys.exit()
GPIO.cleanup()
