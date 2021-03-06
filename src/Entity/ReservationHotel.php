<?php

namespace App\Entity;

use App\Repository\ReservationHotelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationHotelRepository::class)
 */
class ReservationHotel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TypeChambre;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreDeChambre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pension;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreNuit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CategorieChambre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeChambre(): ?string
    {
        return $this->TypeChambre;
    }

    public function setTypeChambre(string $TypeChambre): self
    {
        $this->TypeChambre = $TypeChambre;

        return $this;
    }

    public function getNombreDeChambre(): ?int
    {
        return $this->NombreDeChambre;
    }

    public function setNombreDeChambre(int $NombreDeChambre): self
    {
        $this->NombreDeChambre = $NombreDeChambre;

        return $this;
    }

    public function getPension(): ?string
    {
        return $this->Pension;
    }

    public function setPension(string $Pension): self
    {
        $this->Pension = $Pension;

        return $this;
    }

    public function getNombreNuit(): ?int
    {
        return $this->NombreNuit;
    }

    public function setNombreNuit(int $NombreNuit): self
    {
        $this->NombreNuit = $NombreNuit;

        return $this;
    }

    public function getCategorieChambre(): ?string
    {
        return $this->CategorieChambre;
    }

    public function setCategorieChambre(string $CategorieChambre): self
    {
        $this->CategorieChambre = $CategorieChambre;

        return $this;
    }
}
