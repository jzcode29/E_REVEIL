<?php
//src/ER/MenuBundle/Launcher/AudioFileLauncher.php

namespace ER\MenuBundle\Launcher;

use ER\MenuBundle\Entity\Audio;

class AudioFileLauncher

{
  

  public function fileExecutionAddAudio(Audio $audio)
  
  {


     fopen("\\var\\www\\e_reveil\\TextFiles\\Audio.txt", "w+");
	 
 
  }
  
  public function fileExecutionEditAudio(Audio $audio)
  
  {
     
      fopen("\\var\\www\\e_reveil\\TextFiles\\Audio.txt", "w+");
	 
 
  }
  
  public function fileExecutionDeleteAudio(Audio $audio)
  
  {
     
  fopen("\\var\\www\\e_reveil\\TextFiles\\Audio.txt", "w+");
	 
 
  }
  

}


