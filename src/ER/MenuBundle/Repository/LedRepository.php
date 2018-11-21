<?php
// src/ER/MenuBundle/Repository/LedRepository.php

namespace ER\MenuBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;


class LedRepository extends EntityRepository
{
     
	 
	public function getHeures($id) 

{
      $qb = $this->createQueryBuilder('h');

    // On fait une jointure avec l'entité Categorie, avec pour alias « c »
    $qb ->join('h.led', 'l')
        ->where('l.id = :id')
		->setParameter('id', $id);

    // Enfin, on retourne le résultat
    return $qb->getQuery()
              ->getResult();
	   
}


 public function getLedWithHeures($id)
  {
    $qb = $this->createQueryBuilder('l');

    // On fait une jointure avec l'entité Category avec pour alias « c »
    $qb
      ->innerJoin('l.heures', 'h')
      ->addSelect('h')
    

     ->where('l.id = :id')
		->setParameter('id', $id);

    // Enfin, on retourne le résultat
    return $qb->getQuery()
              ->getResult();
  }
  

 
}
