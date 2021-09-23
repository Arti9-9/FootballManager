<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $Logo;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="homeTeam")
     */
    private $homeGames;

    /**
     * @ORM\OneToMany(targetEntity=Game::class, mappedBy="visitTeam")
     */
    private $visitGames;

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="team")
     */
    private $players;

    public function __construct()
    {
        $this->homeGames = new ArrayCollection();
        $this->visitGames = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(?string $Logo): self
    {
        $this->Logo = $Logo;

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getHomeGames(): Collection
    {
        return $this->homeGames;
    }

    public function addHomeGame(Game $homeGame): self
    {
        if (!$this->homeGames->contains($homeGame)) {
            $this->homeGames[] = $homeGame;
            $homeGame->setHomeTeam($this);
        }

        return $this;
    }

    public function removeHomeGame(Game $homeGame): self
    {
        if ($this->homeGames->removeElement($homeGame)) {
            // set the owning side to null (unless already changed)
            if ($homeGame->getHomeTeam() === $this) {
                $homeGame->setHomeTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getVisitGames(): Collection
    {
        return $this->visitGames;
    }

    public function addVisitGame(Game $visitGame): self
    {
        if (!$this->visitGames->contains($visitGame)) {
            $this->visitGames[] = $visitGame;
            $visitGame->setVisitTeam($this);
        }

        return $this;
    }

    public function removeVisitGame(Game $visitGame): self
    {
        if ($this->visitGames->removeElement($visitGame)) {
            // set the owning side to null (unless already changed)
            if ($visitGame->getVisitTeam() === $this) {
                $visitGame->setVisitTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setTeam($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getTeam() === $this) {
                $player->setTeam(null);
            }
        }

        return $this;
    }
}
