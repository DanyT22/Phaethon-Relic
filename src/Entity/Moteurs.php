<?php

namespace App\Entity;

use App\Repository\MoteursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoteursRepository::class)]
class Moteurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomMoteur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?raretes $rarete = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?specialites $specialite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMoteur(): ?string
    {
        return $this->nomMoteur;
    }

    public function setNomMoteur(string $nomMoteur): static
    {
        $this->nomMoteur = $nomMoteur;

        return $this;
    }

    public function getRarete(): ?raretes
    {
        return $this->rarete;
    }

    public function setRarete(?raretes $rarete): static
    {
        $this->rarete = $rarete;

        return $this;
    }

    public function getSpecialite(): ?specialites
    {
        return $this->specialite;
    }

    public function setSpecialite(?specialites $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }
}
