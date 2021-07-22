<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentaireRefugeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;

/**
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"contenu": "partial","refuge":"exact","user":"exact"})
 * @ORM\Entity(repositoryClass=CommentaireRefugeRepository::class)
 */
class CommentaireRefuge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Refuges::class)
     */
    private $refuge;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getRefuge(): ?Refuges
    {
        return $this->refuge;
    }

    public function setRefuge(?Refuges $refuge): self
    {
        $this->refuge = $refuge;

        return $this;
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
}
