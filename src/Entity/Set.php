<?php

namespace App\Entity;

use App\Repository\SetRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Effet2pc = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Effet4pc = null;

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

    public function getEffet2pc(): ?string
    {
        return $this->Effet2pc;
    }

    public function setEffet2pc(string $Effet2pc): static
    {
        $this->Effet2pc = $Effet2pc;

        return $this;
    }

    public function getEffet4pc(): ?string
    {
        return $this->Effet4pc;
    }

    public function setEffet4pc(string $Effet4pc): static
    {
        $this->Effet4pc = $Effet4pc;

        return $this;
    }
}
