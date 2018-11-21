<?php
// src/ER/MenuBundle/Repository/JoursRepository.php

namespace ER\MenuBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;


class JoursRepository extends EntityRepository
{
     
	 
	 public function getLikeQueryBuilder($pattern)
  {
    return $this
      ->createQueryBuilder('j')
      ->where('j.jour LIKE :pattern')
      ->setParameter('pattern', $pattern)
    ;
  }

  

 
}
