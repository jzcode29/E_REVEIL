<?php
//src/ER/MenuBundle/Launcher/AudioFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Audio;

class AudioFileLauncher

{
  

  public function fileExecutionAddAudio(Audio $audio)
  
  {


     //sleep(10);

	exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');
     //exec('/usr/bin/python3  /var/www/e_reveil/script/python/exec_cron.py >> /var/www/e_reveil/script/tmp/log 2>&1');

      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  
  public function fileExecutionEditAudio(Audio $audio)
  
  {
     
       //sleep(10);
     exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');
	//exec('/usr/bin/python3  /var/www/e_reveil/script/python/exec_cron.py >> /var/www/e_reveil/script/tmp/log 2>&1');

      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  
  public function fileExecutionDeleteAudio(Audio $audio)
  
  {
     
    //sleep(10);
     
    exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  

}


