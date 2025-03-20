<?php

namespace App\Entity;

use App\Repository\PersonnagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnagesRepository::class)]
class Personnages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPersonnage = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Raretes $rarete = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Elements $element = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialites $specialite = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Factions $faction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPersonnage(): ?string
    {
        return $this->nomPersonnage;
    }

    public function setNomPersonnage(string $nomPersonnage): static
    {
        $this->nomPersonnage = $nomPersonnage;

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

    public function getElement(): ?elements
    {
        return $this->element;
    }

    public function setElement(?elements $element): static
    {
        $this->element = $element;

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

    public function getFaction(): ?factions
    {
        return $this->faction;
    }

    public function setFaction(?factions $faction): static
    {
        $this->faction = $faction;

        return $this;
    }

}
