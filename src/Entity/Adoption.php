<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdoptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdoptionRepository::class)
 */
class Adoption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=FicheAnimal::class, cascade={"persist", "remove"})
     */
    private $animal;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAnimal(): ?FicheAnimal
    {
        return $this->animal;
    }

    public function setAnimal(?FicheAnimal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

}
