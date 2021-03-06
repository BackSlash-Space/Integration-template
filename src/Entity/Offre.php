<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository", repositoryClass=OffreRepository::class)
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     */
    private $nomOffre;

    /**
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     */
    private $dateDebutOffre;

    /**
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     *
     */
    private $dateFinOffre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ooups")
     * @Assert\Length(min="8",
     *     minMessage="Not valid under 8")
     */
    private $descOffre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOffre(): ?string
    {
        return $this->nomOffre;
    }

    public function setNomOffre(string $nomOffre): self
    {
        $this->nomOffre = $nomOffre;

        return $this;
    }


    public function getDateFinOffre(): ?string
    {
        return $this->dateFinOffre;
    }

    public function setDateFinOffre(string $dateFinOffre): self
    {
        $this->dateFinOffre = $dateFinOffre;

        return $this;
    }
    public function getDateDebutOffre(): ?string
    {
        return $this->dateDebutOffre;
    }

    public function setDateDebutOffre($dateDebutOffre): self
    {
        $this->dateDebutOffre = $dateDebutOffre;

        return $this;
    }

    public function getDescOffre(): ?string
    {
        return $this->descOffre;
    }

    public function setDescOffre(string $descOffre): self
    {
        $this->descOffre = $descOffre;

        return $this;
    }
}
