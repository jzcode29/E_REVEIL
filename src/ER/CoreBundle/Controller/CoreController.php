<?php

namespace ER\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
  // La page d'accueil
  public function homeAction()
  {
    // On retourne simplement la vue de la page d'accueil
    
    return $this->render('ERCoreBundle:Core:index.html.twig');

    
  }

 
}
