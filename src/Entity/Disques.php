<?php

namespace App\Entity;

use App\Enum\Emplacement;
use App\Enum\SubStat;
use App\Enum\mainStat;
use App\Entity\Set;
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

    #[ORM\Column(type: 'float')]
    private ?float $valeurSubStat1 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat2 = null;

    #[ORM\Column(type: 'float')]
    private ?float $valeurSubStat2 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat3 = null;

    #[ORM\Column(type: 'float')]
    private ?float $valeurSubStat3 = null;

    #[ORM\Column(enumType: SubStat::class)]
    private ?SubStat $subStat4 = null;

    #[ORM\Column(type: 'float')]
    private ?float $valeurSubStat4 = null;

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

    public function getEmplacementString(): ?string
    {
        return $this->emplacement->value;
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

    public function getMainStatString(): ?string
    {
        return $this->mainStat->value;
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

    public function getSubStatString1(): ?string
    {
        return $this->subStat1->value;
    }

    public function setSubStat1(SubStat $subStat1): static
    {
        $this->subStat1 = $subStat1;

        return $this;
    }

    public function getValeurSubStat1(): ?float
    {
        return $this->valeurSubStat1;
    }

    public function setValeurSubStat1(float $valeurSubStat1): static
    {
        $this->valeurSubStat1 = $valeurSubStat1;

        return $this;
    }

    public function getSubStat2(): ?SubStat
    {
        return $this->subStat2;
    }

    public function getSubStatString2(): ?string
    {
        return $this->subStat2->value;
    }

    public function setSubStat2(SubStat $subStat2): static
    {
        $this->subStat2 = $subStat2;

        return $this;
    }

    public function getValeurSubStat2(): ?float
    {
        return $this->valeurSubStat2;
    }

    public function setValeurSubStat2(float $valeurSubStat2): static
    {
        $this->valeurSubStat2 = $valeurSubStat2;

        return $this;
    }

    public function getSubStat3(): ?SubStat
    {
        return $this->subStat3;
    }

    public function getSubStatString3(): ?string
    {
        return $this->subStat3->value;
    }

    public function setSubStat3(SubStat $subStat3): static
    {
        $this->subStat3 = $subStat3;

        return $this;
    }

    public function getValeurSubStat3(): ?float
    {
        return $this->valeurSubStat3;
    }

    public function setValeurSubStat3(float $valeurSubStat3): static
    {
        $this->valeurSubStat3 = $valeurSubStat3;

        return $this;
    }

    public function getSubStat4(): ?SubStat
    {
        return $this->subStat4;
    }

    public function getSubStatString4(): ?string
    {
        return $this->subStat4->value;
    }

    public function setSubStat4(SubStat $subStat4): static
    {
        $this->subStat4 = $subStat4;

        return $this;
    }

    public function getValeurSubStat4(): ?float
    {
        return $this->valeurSubStat4;
    }

    public function setValeurSubStat4(float $valeurSubStat4): static
    {
        $this->valeurSubStat4 = $valeurSubStat4;

        return $this;
    }

}
