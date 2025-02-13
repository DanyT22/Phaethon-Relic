<?php

namespace App\Entity;

use App\Enum\position;
use App\Repository\TeamMemberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamMemberRepository::class)]
class TeamMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?teams $team = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?builds $build = null;

    #[ORM\Column(enumType: position::class)]
    private ?position $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?teams
    {
        return $this->team;
    }

    public function setTeam(?teams $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getBuild(): ?builds
    {
        return $this->build;
    }

    public function setBuild(?builds $build): static
    {
        $this->build = $build;

        return $this;
    }

    public function getPosition(): ?position
    {
        return $this->position;
    }

    public function setPosition(position $position): static
    {
        $this->position = $position;

        return $this;
    }
}
