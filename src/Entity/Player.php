<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FCS;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $captain;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $photo;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="players")
     */
    private $team;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFCS(): ?string
    {
        return $this->FCS;
    }

    public function setFCS(string $FCS): self
    {
        $this->FCS = $FCS;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getCaptain(): ?bool
    {
        return $this->captain;
    }

    public function setCaptain(?bool $captain): self
    {
        $this->captain = $captain;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

        return $this;
    }
}
