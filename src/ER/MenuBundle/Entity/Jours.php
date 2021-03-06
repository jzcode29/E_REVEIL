<?php
// src/ER/MenuBundle/Entity/Jours.php
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
 * @ORM\Table(name="jours")
 * @ORM\Entity(repositoryClass="ER\MenuBundle\Repository\JoursRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Jours
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
   * @ORM\Column(name="jour", type="string")
   */
  private $jour;
  
  
 /**
   * @var int
   * @ORM\Column(name="numero_jour", type="integer")
   */
  private $numeroJour;

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
     * Set jour
     *
     * @param string $jour
     *
     * @return Jours
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set numeroJour
     *
     * @param \int $numeroJour
     *
     * @return Jours
     */
    public function setNumeroJour($numeroJour)
    {
        $this->numeroJour = $numeroJour;

        return $this;
    }

    /**
     * Get numeroJour
     *
     * @return \int
     */
    public function getNumeroJour()
    {
        return $this->numeroJour;
    }
}
