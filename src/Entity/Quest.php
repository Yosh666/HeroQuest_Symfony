<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuestRepository::class)
 */
class Quest
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_heroes;

    /**
     * @ORM\Column(type="date")
     */
    private $started_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $difficulty;

    /**
     * @ORM\Column(type="integer")
     */
    private $align;

    /**
     * @ORM\ManyToMany(targetEntity=Voie::class, inversedBy="quests")
     */
    private $voies;

    /**
     * @ORM\ManyToMany(targetEntity=Aventurier::class, mappedBy="quests")
     */
    private $aventuriers;

    public function __construct()
    {
        $this->voies = new ArrayCollection();
        $this->aventuriers = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNbHeroes(): ?int
    {
        return $this->nb_heroes;
    }

    public function setNbHeroes(int $nb_heroes): self
    {
        $this->nb_heroes = $nb_heroes;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->started_at;
    }

    public function setStartedAt(\DateTimeInterface $started_at): self
    {
        $this->started_at = $started_at;

        return $this;
    }

    public function getDifficulty(): ?int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getAlign(): ?int
    {
        return $this->align;
    }

    public function setAlign(int $align): self
    {
        $this->align = $align;

        return $this;
    }

    /**
     * @return Collection|Voie[]
     */
    public function getVoies(): Collection
    {
        return $this->voies;
    }

    public function addVoie(Voie $voie): self
    {
        if (!$this->voies->contains($voie)) {
            $this->voies[] = $voie;
        }

        return $this;
    }

    public function removeVoie(Voie $voie): self
    {
        if ($this->voies->contains($voie)) {
            $this->voies->removeElement($voie);
        }

        return $this;
    }

    /**
     * @return Collection|Aventurier[]
     */
    public function getAventuriers(): Collection
    {
        return $this->aventuriers;
    }

    public function addAventurier(Aventurier $aventurier): self
    {
        if (!$this->aventuriers->contains($aventurier)) {
            $this->aventuriers[] = $aventurier;
            $aventurier->addQuest($this);
        }

        return $this;
    }

    public function removeAventurier(Aventurier $aventurier): self
    {
        if ($this->aventuriers->contains($aventurier)) {
            $this->aventuriers->removeElement($aventurier);
            $aventurier->removeQuest($this);
        }

        return $this;
    }

   
}
