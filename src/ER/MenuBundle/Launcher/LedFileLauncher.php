<?php
//src/ER/MenuBundle/Launcher/LedFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Led;

class LedFileLauncher
{
  

  public function fileExecutionAddLed(Led $led)
  
  {
	  
	  
   exec('bin/sh /var/www/e_reveil/script/sbin/appele_cron.sh');
	 
 
  }
  
  public function fileExecutionEditLed(Led $led)
  
  {
     
    
     
	fopen("var\\www\\e_reveil\\TextFiles\\Led.txt", "w+");
	 
 
  }
  
  public function fileExecutionDeleteLed(Led $led)
  
  {
     
     
  fopen("var\\www\\e_reveil\\TextFiles\\Led.txt", "w+");
	 
 
  }
  

}


