<?php
//src/ER/MenuBundle/Launcher/LedFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Led;

class LedFileLauncher
{
  

  public function fileExecutionAddLed(Led $led)
  
  {
	  
	  
	//sleep(10);  
     
	exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');

      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  
  public function fileExecutionEditLed(Led $led)
  
  {
     
    //sleep(10);   
     
	exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');


	//exec('/usr/bin/python3  /var/www/e_reveil/script/python/exec_cron.py >> /var/www/e_reveil/script/tmp/log 2>&1');
      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  
  public function fileExecutionDeleteLed(Led $led)
  
  {
     
     
    //sleep(10);   
     exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');
   //exec('/usr/bin/python3  /var/www/e_reveil/script/python/exec_cron.py >> /var/www/e_reveil/script/tmp/log 2>&1');
      
    //fopen("c:\\wamp\\www\\e_reveil\\text.txt", "w+");
	 
 
  }
  

}


