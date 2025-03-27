<?php

namespace App\Entity;

use App\Repository\BuildsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildsRepository::class)]
class Builds
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Personnages $personnage = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque1 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque2 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque3 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque4 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque5 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disques $disque6 = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Moteurs $Moteur = null;

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

    public function getDisque1(): ?disques
    {
        return $this->disque1;
    }

    public function setDisque1(?disques $disque1): static
    {
        $this->disque1 = $disque1;

        return $this;
    }

    public function getDisque2(): ?disques
    {
        return $this->disque2;
    }

    public function setDisque2(?disques $disque2): static
    {
        $this->disque2 = $disque2;

        return $this;
    }

    public function getDisque3(): ?disques
    {
        return $this->disque3;
    }

    public function setDisque3(?disques $disque3): static
    {
        $this->disque3 = $disque3;

        return $this;
    }

    public function getDisque4(): ?disques
    {
        return $this->disque4;
    }

    public function setDisque4(?disques $disque4): static
    {
        $this->disque4 = $disque4;

        return $this;
    }

    public function getDisque5(): ?disques
    {
        return $this->disque5;
    }

    public function setDisque5(?disques $disque5): static
    {
        $this->disque5 = $disque5;

        return $this;
    }

    public function getDisque6(): ?disques
    {
        return $this->disque6;
    }

    public function setDisque6(?disques $disque6): static
    {
        $this->disque6 = $disque6;

        return $this;
    }

    public function getMoteur(): ?Moteurs
    {
        return $this->Moteur;
    }

    public function setMoteur(?Moteurs $Moteur): static
    {
        $this->Moteur = $Moteur;

        return $this;
    }
}
