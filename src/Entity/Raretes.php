<?php

namespace App\Entity;

use App\Repository\RaretesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RaretesRepository::class)]
class Raretes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    private ?string $rarete = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRarete(): ?string
    {
        return $this->rarete;
    }

    public function setRarete(string $rarete): static
    {
        $this->rarete = $rarete;

        return $this;
    }
}
