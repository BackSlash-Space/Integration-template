<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository", repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     */
    private $nomEvent;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Ooups")
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuEvent;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     * @Assert\Length(min="8",
     *     minMessage="Not valid under 8")
     */
    private $descEvent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageEvent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cancelEvent" , type="boolean")
     */
    private $cancelEvent = true;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEvent(): ?string
    {
        return $this->nomEvent;
    }

    public function setNomEvent(string $nomEvent): self
    {
        $this->nomEvent = $nomEvent;

        return $this;
    }


   //public function __construct()
    //{
      //   $this->dateEvent = new \DateTime('NOW');
    //}
///**
 //* Get dateEvent
 //*
 //* @return \DateTime

//public function getDateEvent()
//{
//    return $this->dateEvent;
//}


  //  /**
    // * set dateEvent
     //* @param \DateTime $dateEvent
     //* @return Evenement
     //*/
    //public function setDateEvent($dateEvent)
    //{
      //  $this->dateEvent = $dateEvent;

        //return $this;
    //}
    public function getDateEvent(): ?string
    {
        return $this->dateEvent;
    }

    public function setDateEvent(string $dateEvent): self
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }


    public function getLieuEvent(): ?string
    {
        return $this->lieuEvent;
    }

    public function setLieuEvent(string $lieuEvent): self
    {
        $this->lieuEvent = $lieuEvent;

        return $this;
    }

    public function getDescEvent(): ?string
    {
        return $this->descEvent;
    }

    public function setDescEvent(string $descEvent): self
    {
        $this->descEvent = $descEvent;

        return $this;
    }

    public function getImageEvent(): ?string
    {
        return $this->imageEvent;
    }

    public function setImageEvent(string $imageEvent): self
    {
        $this->imageEvent = $imageEvent;

        return $this;
    }
    /**
     * set cancelEvent
     *
     * @param boolean $cancelEvent
     * @return Evenement
     */
     public function setCancelEvent($cancelEvent)
{
    $this->cancelEvent=$cancelEvent;
    return $this;
}
    /**
     * Get cancelEvent
     *
     * @return boolean
     */
     public function getCancelEvent()
     {
         return $this->cancelEvent;
     }
}
