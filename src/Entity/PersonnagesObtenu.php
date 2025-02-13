<?php

namespace App\Entity;

use App\Repository\PersonnagesObtenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnagesObtenuRepository::class)]
class PersonnagesObtenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?personnages $personnage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getPersonnage(): ?personnages
    {
        return $this->personnage;
    }

    public function setPersonnage(?personnages $personnage): static
    {
        $this->personnage = $personnage;

        return $this;
    }
}
