<?php

namespace App\Entity;

use App\Enum\Emplacement;
use App\Enum\SubStat;
use App\Enum\mainStat;
use App\Repository\DisquesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisquesRepository::class)]
class Disques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Set $ensemble = null;

    #[ORM\Column(enumType: Emplacement::class)]
    private ?Emplacement $emplacement = null;

    #[ORM\Column(enumType: mainStat::class)]
    private ?mainStat $mainStat = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat1 = null;

    #[ORM\Column]
    private ?int $procSubStat1 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat2 = null;

    #[ORM\Column]
    private ?int $procSubStat2 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat3 = null;

    #[ORM\Column]
    private ?int $procSubStat3 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat4 = null;

    #[ORM\Column]
    private ?int $procSubStat4 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnsemble(): ?set
    {
        return $this->ensemble;
    }

    public function setEnsemble(?set $ensemble): static
    {
        $this->ensemble = $ensemble;

        return $this;
    }

    public function getEmplacement(): ?Emplacement
    {
        return $this->emplacement;
    }

    public function setEmplacement(Emplacement $emplacement): static
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    public function getMainStat(): ?mainStat
    {
        return $this->mainStat;
    }

    public function setMainStat(mainStat $mainStat): static
    {
        $this->mainStat = $mainStat;

        return $this;
    }

    public function getSubStat1(): ?SubStat
    {
        return $this->subStat1;
    }

    public function setSubStat1(SubStat $subStat1): static
    {
        $this->subStat1 = $subStat1;

        return $this;
    }

    public function getProcSubStat1(): ?int
    {
        return $this->procSubStat1;
    }

    public function setProcSubStat1(int $procSubStat1): static
    {
        $this->procSubStat1 = $procSubStat1;

        return $this;
    }

    public function getSubStat2(): ?SubStat
    {
        return $this->subStat2;
    }

    public function setSubStat2(SubStat $subStat2): static
    {
        $this->subStat2 = $subStat2;

        return $this;
    }

    public function getProcSubStat2(): ?int
    {
        return $this->procSubStat2;
    }

    public function setProcSubStat2(int $procSubStat2): static
    {
        $this->procSubStat2 = $procSubStat2;

        return $this;
    }

    public function getSubStat3(): ?SubStat
    {
        return $this->subStat3;
    }

    public function setSubStat3(SubStat $subStat3): static
    {
        $this->subStat3 = $subStat3;

        return $this;
    }

    public function getProcSubStat3(): ?int
    {
        return $this->procSubStat3;
    }

    public function setProcSubStat3(int $procSubStat3): static
    {
        $this->procSubStat3 = $procSubStat3;

        return $this;
    }

    public function getSubStat4(): ?SubStat
    {
        return $this->subStat4;
    }

    public function setSubStat4(SubStat $subStat4): static
    {
        $this->subStat4 = $subStat4;

        return $this;
    }

    public function getProcSubStat4(): ?int
    {
        return $this->procSubStat4;
    }

    public function setProcSubStat4(int $procSubStat4): static
    {
        $this->procSubStat4 = $procSubStat4;

        return $this;
    }

}
