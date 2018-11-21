<?php
// src/ER/MenuBundle/Entity/Audio.php
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
 * @ORM\Table(name="audio")
 * @ORM\Entity(repositoryClass="ER\MenuBundle\Repository\AudioRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Audio
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
   * @ORM\Column(name="volume_maximum", type="integer")
   * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas valide. Veuillez saisir un nombre entier."
	 *)
   * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "Vous devez spécifier un nombre entre 0 et 100",
     *      maxMessage = "Merci de spécifier une valeur entre 0 et 100")
   */
  private $volumeMax;
  

 
  
  
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
   * @ORM\OneToOne(targetEntity="ER\MenuBundle\Entity\FichierAudio", cascade={"persist", "remove"})
   */
  private $fichierAudio;
 
   
    

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set volumeMax
     *
     * @param integer $volumeMax
     *
     * @return Audio
     */
    public function setVolumeMax($volumeMax)
    {
        $this->volumeMax = $volumeMax;

        return $this;
    }

    /**
     * Get volumeMax
     *
     * @return integer
     */
    public function getVolumeMax()
    {
        return $this->volumeMax;
    }

    

    /**
     * Add jour
     *
     * @param \ER\MenuBundle\Entity\Jours $jour
     *
     * @return Audio
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
     * @return Audio
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
     * @return Audio
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

    /**
     * Set fichierAudio
     *
     * @param \ER\MenuBundle\Entity\FichierAudio $fichierAudio
     *
     * @return Audio
     */
    public function setFichierAudio(\ER\MenuBundle\Entity\FichierAudio $fichierAudio = null)
    {
        $this->fichierAudio = $fichierAudio;

        return $this;
    }

    /**
     * Get fichierAudio
     *
     * @return \ER\MenuBundle\Entity\FichierAudio
     */
    public function getFichierAudio()
    {
        return $this->fichierAudio;
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
     * Set jour
     *
     * @param \ER\MenuBundle\Entity\Jours $jour
     *
     * @return Led
     */
    public function setJour(\ER\MenuBundle\Entity\Jours $jour)
    {
        $this->jours[] = $jour;

        return $this;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
