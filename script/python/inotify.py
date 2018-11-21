#!/usr/bin/python3
#-*- coding:utf-8 -*-


import pyinotify
import os
import time


wm = pyinotify.WatchManager() # Watch Manager
mask = pyinotify.IN_MOVED_TO | pyinotify.IN_CREATE    # watched events
directory = '/var/www/e_reveil/script/inotify'
inotify = "inoftify"

class EventHandler(pyinotify.ProcessEvent):
    
    def process_IN_MOVED_TO(self, event):
        if event.dir:
            print("os.system('sh /var/www/e_reveil/script/sbin/reload_cron.sh')")
        else:
            print("os.system('sh /var/www/e_reveil/script/sbin/reload_cron.sh')")

    def process_IN_CREATE(self, event):

        if event.dir:
          
            os.system('sh /var/www/e_reveil/script/sbin/lance_cron.sh')
        else:
      
            os.system('sh /var/www/e_reveil/script/sbin/lance_cron.sh')


handler = EventHandler()
notifier = pyinotify.Notifier(wm, handler)
wdd = wm.add_watch(directory, mask, rec=True, auto_add=True)

notifier.loop()