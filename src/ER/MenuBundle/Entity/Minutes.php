<?php
// src/ER/MenuBundle/Entity/Minutes.php
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
 * @ORM\Table(name="minutes")
 * @ORM\Entity(repositoryClass="ER\MenuBundle\Repository\MinutesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Minutes
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
   * @var 
   * @ORM\Column(name="minute", type="string")
   */
   
   
  private $minute; 
   
   
 
  

    

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
     * Set minute
     *
     * @param string $minute
     *
     * @return Minutes
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;

        return $this;
    }

    /**
     * Get minute
     *
     * @return string
     */
    public function getMinute()
    {
        return $this->minute;
    }
    

    
   
}
