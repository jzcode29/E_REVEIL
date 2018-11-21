<?php
// src/ER/MenuBundle/Entity/Led.php
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
 * @ORM\Table(name="led")
 * @ORM\Entity(repositoryClass="ER\MenuBundle\Repository\LedRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Led
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
   * @var int
   * @ORM\Column(name="duree_progression_allumage", type="integer")
   * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas valide. Veuillez saisir un nombre entier."
	 *)
   * @Assert\Range(
     *      min = 1,
     *      minMessage = "Vous devez spécifier un nombre compris entre 1 et 60"
	 *)
   */
  private $dureeProgressionAllumage;
  
  
 /**
   * @var int
   * @ORM\Column(name="luminosite_fin_allumage", type="integer")
   * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "Vous devez spécifier un nombre entre 0 et 100",
     *      maxMessage = "Merci de spécifier une valeur entre 0 et 100")
   * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas valide. Veuillez saisir un nombre entier compris entre 0 et 100."
	 *)
   */
  private $luminositeFinAllumage;
  

 
  /**
   * @ORM\ManyToMany(targetEntity="ER\MenuBundle\Entity\Audio", cascade={"persist", "remove"})
   * nullable=true
   */
  private $audio;
 
 /**
   * @ORM\ManyToMany(targetEntity="ER\MenuBundle\Entity\Jours", cascade={"persist"})
   * nullable=true
   */
   
  private $jours;
 
 /**
   * @ORM\ManyToMany(targetEntity="ER\MenuBundle\Entity\Heures", cascade={"persist"})
   * nullable=true
   */
   
  private $heure;
  
 /**
   * @ORM\ManyToMany(targetEntity="ER\MenuBundle\Entity\Minutes", cascade={"persist"})
   * nullable=true
   */
   
  private $minute;
  
  
 
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->audio = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jours = new \Doctrine\Common\Collections\ArrayCollection();
        $this->heure = new \Doctrine\Common\Collections\ArrayCollection();
        $this->minute = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set dureeProgressionAllumage
     *
     * @param integer $dureeProgressionAllumage
     *
     * @return Led
     */
    public function setDureeProgressionAllumage($dureeProgressionAllumage)
    {
        $this->dureeProgressionAllumage = $dureeProgressionAllumage;

        return $this;
    }

    /**
     * Get dureeProgressionAllumage
     *
     * @return integer
     */
    public function getDureeProgressionAllumage()
    {
        return $this->dureeProgressionAllumage;
    }

    /**
     * Set luminositeFinAllumage
     *
     * @param integer $luminositeFinAllumage
     *
     * @return Led
     */
    public function setLuminositeFinAllumage($luminositeFinAllumage)
    {
        $this->luminositeFinAllumage = $luminositeFinAllumage;

        return $this;
    }

    /**
     * Get luminositeFinAllumage
     *
     * @return integer
     */
    public function getLuminositeFinAllumage()
    {
        return $this->luminositeFinAllumage;
    }

    /**
     * Add audio
     *
     * @param \ER\MenuBundle\Entity\Audio $audio
     *
     * @return Led
     */
    public function addAudio(\ER\MenuBundle\Entity\Audio $audio)
    {
        $this->audio[] = $audio;

        return $this;
    }

    /**
     * Remove audio
     *
     * @param \ER\MenuBundle\Entity\Audio $audio
     */
    public function removeAudio(\ER\MenuBundle\Entity\Audio $audio)
    {
        $this->audio->removeElement($audio);
    }

    /**
     * Get audio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAudio()
    {
        return $this->audio;
    }

	
	
	/**
     * Set jours
     *
     * @param \ER\MenuBundle\Entity\Jours $jours
     *
     * @return Led
     */
    public function setJour(\ER\MenuBundle\Entity\Jours $jours)
    {
        $this->jours[] = $jours;

        return $this;
    }
	
	
	/**
     * Set heure
     *
     * @param \ER\MenuBundle\Entity\Heures $heure
     *
     * @return Led
     */
    public function setHeure(\ER\MenuBundle\Entity\Heures $heure)
    {
        $this->heure[] = $heure;

        return $this;
    }
	
	/**
     * Set minute
     *
     * @param \ER\MenuBundle\Entity\Minutes $minute
     *
     * @return Led
     */
    public function setMinute(\ER\MenuBundle\Entity\Minutes $minute)
    {
        $this->minute[] = $minute;

        return $this;
    }
	
	
	
	
	
	
	
	
	
	
	
    /**
     * Add jour
     *
     * @param \ER\MenuBundle\Entity\Jours $jour
     *
     * @return Led
     */
    public function addJour(\ER\MenuBundle\Entity\Jours $jour)
    {
        $this->jours[] = $jour;

        return $this;
    }

    /**
     * Remove jour
     *
     * @param \ER\MenuBundle\Entity\Jours $jour
     */
    public function removeJour(\ER\MenuBundle\Entity\Jours $jour)
    {
        $this->jours->removeElement($jour);
    }

    /**
     * Get jours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * Add heure
     *
     * @param \ER\MenuBundle\Entity\Heures $heure
     *
     * @return Led
     */
    public function addHeure(\ER\MenuBundle\Entity\Heures $heure)
    {
        $this->heure[] = $heure;

        return $this;
    }

    /**
     * Remove heure
     *
     * @param \ER\MenuBundle\Entity\Heures $heure
     */
    public function removeHeure(\ER\MenuBundle\Entity\Heures $heure)
    {
        $this->heure->removeElement($heure);
    }

    /**
     * Get heure
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Add minute
     *
     * @param \ER\MenuBundle\Entity\Minutes $minute
     *
     * @return Led
     */
    public function addMinute(\ER\MenuBundle\Entity\Minutes $minute)
    {
        $this->minute[] = $minute;

        return $this;
    }

    /**
     * Remove minute
     *
     * @param \ER\MenuBundle\Entity\Minutes $minute
     */
    public function removeMinute(\ER\MenuBundle\Entity\Minutes $minute)
    {
        $this->minute->removeElement($minute);
    }

    /**
     * Get minute
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMinute()
    {
        return $this->minute;
		
	
	 }
				
	
		
		
		
		
		
		
		
		
		
		
   
}
