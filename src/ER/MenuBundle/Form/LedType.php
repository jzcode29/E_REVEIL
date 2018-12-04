<?php
// src/ER/MenuBundle/Form/LedType.php

namespace ER\MenuBundle\Form;

use ER\MenuBundle\Repository\JoursRepository;
use ER\MenuBundle\Repository\HeuresRepository;
use ER\MenuBundle\Repository\MinutesRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType ;
use Symfony\Component\Form\Extension\Core\Type\TimeType ;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class LedType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    


    $builder    
      ->add('Jours', EntityType::class, array(
        'class'         => 'MenuBundle:Jours',
		'attr' => ['class' => 'bold'],
        'choice_label'  => 'jour',
        'multiple'      => true,
		'expanded' => true))
       ->add('heure', EntityType::class, array(
       'class'         => 'MenuBundle:Heures',
       'choice_label'  => 'heure',
       'multiple'      => false,
	   'expanded' => false))
       ->add('minute', EntityType::class, array(
       'class'         => 'MenuBundle:Minutes',
       'choice_label'  => 'minute',
       'multiple'      => false,
	   'expanded' => false))
	   ->add('dureeProgressionAllumage',IntegerType::class)
       ->add('luminositeFinAllumage',IntegerType::class)
       ;
   
 
   
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'ER\MenuBundle\Entity\Led'
    ));
  }
 
}
