<?php
//src/ER/MenuBundle/DoctrineListener/AudioListener.php

namespace ER\MenuBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use ER\MenuBundle\Launcher\AudioFileLauncher;
use ER\MenuBundle\Entity\Audio;

class AudioListener

{
	
  /**
   * @var AudioFileLauncher
   */
   
  private $audioFileLauncher;

  public function __construct(AudioFileLauncher $audioFileLauncher)
  
  {
    $this->audioFileLauncher = $audioFileLauncher;
  }

  public function postPersist(LifecycleEventArgs $args)
  
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Audio
    if (!$entity instanceof Audio) {
      return;
    }

    $this->audioFileLauncher->fileExecutionAudio($entity);
  }
  
  
  public function postUpdate(LifecycleEventArgs $args)
  
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Audio
    if (!$entity instanceof Audio) {
      return;
    }

    $this->audioFileLauncher->fileExecutionAudio($entity);
  }
  
  
   public function postRemove(LifecycleEventArgs $args)
  
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Audio
    if (!$entity instanceof Audio) {
      return;
    }

    $this->audioFileLauncher->fileExecutionAudio($entity);
  }
  
  
  
}
