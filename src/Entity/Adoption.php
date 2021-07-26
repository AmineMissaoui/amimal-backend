<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdoptionRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdoptionRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"animal": "exact","user": "exact"})
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
