<?php
// src/ER/MenuBundle/Entity/Heures.php
namespace ER\MenuBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ER\MenuBundle\Validator\Antiflood;
// On rajoute ce use pour la contrainte :
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
// N'oubliez pas de rajouter ce « use », il définit le namespace pour les annotations de validation
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @ORM\Table(name="heures")
 * @ORM\Entity(repositoryClass="ER\MenuBundle\Repository\HeuresRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Heures
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;
  
  
   /**
   * @var string
   * @ORM\Column(name="heure", type="string")
   */
   
   
  private $heure; 
   
  
 
  
 

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set heure
     *
     * @param string $heure
     *
     * @return Heures
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }
   
  

   
    

   

    
}
