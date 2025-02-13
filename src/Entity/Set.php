<?php

namespace App\Entity;

use App\Repository\SetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SetRepository::class)]
#[ORM\Table(name: '`set`')]
class Set
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomSet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSet(): ?string
    {
        return $this->nomSet;
    }

    public function setNomSet(string $nomSet): static
    {
        $this->nomSet = $nomSet;

        return $this;
    }
}
