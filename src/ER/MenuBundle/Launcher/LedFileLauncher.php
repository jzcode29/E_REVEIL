<?php
//src/ER/MenuBundle/Launcher/LedFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Led;

class LedFileLauncher
{
  

  public function fileExecutionLed(Led $led)
  
  {
	  
	exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');

     
  }
  
 
}


