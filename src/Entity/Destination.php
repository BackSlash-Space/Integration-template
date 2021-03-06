<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @Assert\Length(min = 3 , max = 30)
     *   @Assert\Regex("/^[a-z]+/" , message="le nom de la ville ne peut pas contenir des chiffre ")
     * @ORM\Column(type="string", length=255)
     */
    private $NomDes;

    /**
     * @Assert\Length(min = 3 , max = 255)
     *  @Assert\NotBlank
     * @ORM\Column(type="text", nullable=true)
     */
    private $inforDes;

    public function getId(): ?int
    {
        return $this->id;
    }





    public function getNomDes(): ?string
    {
        return $this->NomDes;
    }

    public function getSlug(): string{

        return (new Slugify())->slugify($this->getNomDes());
    }

    public function setNomDes(string $NomDes): self
    {
        $this->NomDes = $NomDes;

        return $this;
    }

    public function getInforDes(): ?string
    {
        return $this->inforDes;
    }

    public function setInforDes(?string $inforDes): self
    {
        $this->inforDes = $inforDes;

        return $this;
    }
}
