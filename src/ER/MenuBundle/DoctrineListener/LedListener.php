<?php
//src/ER/MenuBundle/DoctrineListener/LedListener.php

namespace ER\MenuBundle\DoctrineListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use ER\MenuBundle\Launcher\LedFileLauncher;
use ER\MenuBundle\Entity\Led;

class LedListener
{
  /**
   * @var LedFileLauncher
   */
  private $ledFileLauncher;

  public function __construct(LedFileLauncher $ledFileLauncher)
  {
    $this->ledFileLauncher = $ledFileLauncher;
  }

  public function postPersist(LifecycleEventArgs $args)
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Led
    if (!$entity instanceof Led) {
      return;
    }

    $this->ledFileLauncher->fileExecutionAddLed($entity);
  }
  
  
  public function postUpdate(LifecycleEventArgs $args)
  
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Led
    if (!$entity instanceof Led) {
      return;
    }

    $this->ledFileLauncher->fileExecutionEditLed($entity);
  }
  
  
   public function postRemove(LifecycleEventArgs $args)
  
  {
    $entity = $args->getObject();

    // On ne veut appeler le fichier bash que pour les entités Led
    if (!$entity instanceof Led) {
      return;
    }

    $this->ledFileLauncher->fileExecutionDeleteLed($entity);
  }
  
  
  
  
  
  
  
  
  
  
}
