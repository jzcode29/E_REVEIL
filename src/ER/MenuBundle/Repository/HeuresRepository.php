<?php
// src/ER/MenuBundle/Repository/HeuresRepository.php

namespace ER\MenuBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;


class HeuresRepository extends EntityRepository
{
     
	 
	
//select heures.heure, minutes.minute from heures,minutes, led 
//where heures.id = led.heure_id 
//and led.minute_id = minutes.id ;
  

 public function getHeures($id) 

{
      $qb = $this->createQueryBuilder('h');

    // On fait une jointure avec l'entité Categorie, avec pour alias « c »
    $qb ->join('h.led', '')
        ->where('t.id = :id')
		->setParameter('id', $id);

    // Enfin, on retourne le résultat
    return $qb->getQuery()
              ->getResult();
	   
}
}
