<?php
namespace ER\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use ER\MenuBundle\Entity\Led;
use ER\MenuBundle\Entity\Audio;
use ER\MenuBundle\Entity\FichierAudio;
use ER\MenuBundle\Entity\Jours;
use ER\MenuBundle\Entity\Heures;
use ER\MenuBundle\Entity\Minutes;
use ER\MenuBundle\Form\LedType;
use ER\MenuBundle\Form\LedEditType;
use ER\MenuBundle\Form\AudioEditType;
use ER\MenuBundle\Form\AudioType;
use ER\MenuBundle\Form\FichierAudioType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Form\Extension\Core\Type\IntegerType ;
use Symfony\Component\Form\Extension\Core\Type\TimeType ;
class MenuController extends Controller
{
  
  public function verifledAction()
  
  {
    
	// On récupère la liste des paramétrages led existant
    $listLeds = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Led')
      ->findAll()
    ;


    // On donne toutes les informations nécessaires à la vue
    return $this->render('MenuBundle:Menu:indexled.html.twig', array(
      'listLeds' => $listLeds
    ));

    
  }

 
  
  public function addledAction(Request $request)
  
  {
	  
	 // On récupère la liste des paramétrages led existant
    // Si le tableau est vide, le bouton "valider" du formulaire pointera sur la route add-led  
    $listLeds = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Led')
      ->findAll()
    ; 
	  
    
	$led = new Led();
    $form   = $this->get('form.factory')->create(LedType::class, $led);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($led);
      $em->flush();
	  
     
	  
	  
	  
      $request->getSession()->getFlashBag()->add('notice', 'Réveil lumineux configuré et activé !');

      return $this->redirectToRoute('menu_verif_led');
    }

    return $this->render('MenuBundle:Menu:addled.html.twig', array(
	  'listLeds' => $listLeds,
      'form' => $form->createView(),
    ));

    
  }
  
  
   public function ledviewAction($id)
  
  {
    

	$em = $this->getDoctrine()->getManager();

    // Pour récupérer le paramétrage led existant, on utilise la méthode find($id)
    $led = $em->getRepository('MenuBundle:Led')->find($id);

	
    return $this->render('MenuBundle:Menu:viewled.html.twig', array(
      'led'           => $led,
	 
    ));

    
  }
  

  
 public function lededitAction($id, Request $request)
  
  {
	// On récupère la liste des paramétrages led existant
    // Si le tableau n'est pas vide, le bouton "valider" du formulaire pointera sur la route led-edit
    $listLeds = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Led')
      ->findAll()
    ; 
	  
	  //on pointe sur l'id pour récupérer l'entité Led
	  
     $em = $this->getDoctrine()->getManager();

    $led = $em->getRepository('MenuBundle:Led')->find($id);

	
    $form = $this->get('form.factory')->create(LedEditType::class, $led);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      // Inutile de persister ici, Doctrine connait déjà notre paramétrage
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Paramètres modifiés !');

      return $this->redirectToRoute('menu_verif_led');
    }

    return $this->render('MenuBundle:Menu:lededit.html.twig', array(
	   'listLeds' => $listLeds,
      'led' => $led,
      'form'   => $form->createView(),
    ));
	
    
  }
  
  
  public function leddeleteAction($id, Request $request)
  
  {
    
	 $em = $this->getDoctrine()->getManager();

    $led = $em->getRepository('MenuBundle:Led')->find($id);


	//On crée un formulaire vide, qui ne contiendra que le champ CSRF
	//Cela permet de protéger la suppression du paramétrage contre cette faille
	
	$form = $this->get('form.factory')->create();
	
	if($request->isMethod('POST')&& $form->handleRequest($request)->isValid()){


    $em->remove($led);
    $em->flush();

  
   $request->getSession()->getFlashBag()->add('info', 'Paramètres supprimés et réveil lumineux désactivé !' ); 
	
    return $this->redirectToRoute('menu_verif_led');
	
	}
	
	return $this->render('MenuBundle:Menu:leddelete.html.twig', array(
	
	'led' => $led,
	'form'  => $form->createView(),
	
	));
	

    
  }
  
 public function verifaudioAction()
  
  {
    
	// On récupère la liste des paramétrages audio existant
    $listAudios = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Audio')
      ->findAll()
    ;


    // On donne toutes les informations nécessaires à la vue
    return $this->render('MenuBundle:Menu:indexaudio.html.twig', array(
      'listAudios' => $listAudios
    ));

    
  }
  
  
  public function addaudioAction(Request $request)
  
  {
	  
	 // On récupère la liste des paramétrages audio existant
    // Si le tableau est vide, le bouton "valider" du formulaire pointera sur la route add-audio
    $listAudios = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Audio')
      ->findAll()
    ; 
	  
    
	$audio = new Audio();
    $form   = $this->get('form.factory')->create(AudioType::class, $audio);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
	
 
		
      $em = $this->getDoctrine()->getManager();
      $em->persist($audio);
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Réveil audio configuré et activé !');

      return $this->redirectToRoute('menu_verif_audio');
    }

    return $this->render('MenuBundle:Menu:addaudio.html.twig', array(
	  'listAudios' => $listAudios,
      'form' => $form->createView(),
    ));

    
  }
  
  
 
   public function audioviewAction($id)
  
  {
    
	 
	

	$em = $this->getDoctrine()->getManager();

    // Pour récupérer le paramétrage audio existant, on utilise la méthode find($id)
    $audio = $em->getRepository('MenuBundle:Audio')->find($id);

 
    return $this->render('MenuBundle:Menu:viewaudio.html.twig', array(
      'audio'           => $audio
    ));

    
  }
  
 
  
  
  public function audioeditAction($id, Request $request)
  
  {
	  // On récupère la liste des paramétrages audio existant
    // Si le tableau n'est pas vide, le bouton "valider" du formulaire pointera sur la route audio-edit
    $listAudios = $this->getDoctrine()
      ->getManager()
      ->getRepository('MenuBundle:Audio')
      ->findAll()
    ; 
	  
     $em = $this->getDoctrine()->getManager();

    $audio= $em->getRepository('MenuBundle:Audio')->find($id);

   

    $form = $this->get('form.factory')->create(AudioEditType::class, $audio);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      // Inutile de persister ici, Doctrine connait déjà notre paramétrage
      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'Paramètres modifiés !');

      return $this->redirectToRoute('menu_verif_audio');
    }

    return $this->render('MenuBundle:Menu:audioedit.html.twig', array(
	   'listAudios' => $listAudios,
      'audio' => $audio,
      'form'   => $form->createView(),
    ));
  }
  
  
   public function audiodeleteAction($id, Request $request)
  
  {
    
	 $em = $this->getDoctrine()->getManager();

    $audio = $em->getRepository('MenuBundle:Audio')->find($id);

    

    
	//On crée un formulaire vide, qui ne contiendra que le champ CSRF
	//Cela permet de protéger la suppression du paramétrage contre cette faille
	
	$form = $this->get('form.factory')->create();
	
	if($request->isMethod('POST')&& $form->handleRequest($request)->isValid()){


    $em->remove($audio);
    $em->flush();

  
   $request->getSession()->getFlashBag()->add('info', 'Paramètres supprimés et réveil audio désactivé !' ); 
	
    return $this->redirectToRoute('menu_verif_audio');
	
	}
	
	return $this->render('MenuBundle:Menu:audiodelete.html.twig', array(
	
	'audio' => $audio,
	'form'  => $form->createView(),
	
	));
	

	
	
	
    
  }
  

}
