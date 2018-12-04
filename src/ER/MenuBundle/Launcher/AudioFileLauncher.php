<?php
//src/ER/MenuBundle/Launcher/AudioFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Audio;

class AudioFileLauncher

{
  

  public function fileExecutionAudio(Audio $audio)
  
  {


   

	exec('/bin/sh  /var/www/e_reveil/script/sbin/appele_cron.sh >> /var/www/e_reveil/script/tmp/log 2>&1');
    
	 
 
  }
  
 
  

}


