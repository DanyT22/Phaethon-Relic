<?php

namespace App\Entity;

use App\Repository\BangboosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BangboosRepository::class)]
class Bangboos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomBangboo = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Raretes $rarete = null;

    #[ORM\Column(length: 100)]
    private ?string $prerequis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBangboo(): ?string
    {
        return $this->nomBangboo;
    }

    public function setNomBangboo(string $nomBangboo): static
    {
        $this->nomBangboo = $nomBangboo;

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

    public function getPrerequis(): ?string
    {
        return $this->prerequis;
    }

    public function setPrerequis(string $prerequis): static
    {
        $this->prerequis = $prerequis;

        return $this;
    }
}
