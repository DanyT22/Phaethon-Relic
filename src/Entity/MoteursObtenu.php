<?php

namespace App\Entity;

use App\Repository\MoteursObtenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoteursObtenuRepository::class)]
class MoteursObtenu
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
    private ?moteurs $moteur = null;

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

    public function getMoteur(): ?moteurs
    {
        return $this->moteur;
    }

    public function setMoteur(?moteurs $moteur): static
    {
        $this->moteur = $moteur;

        return $this;
    }
}
