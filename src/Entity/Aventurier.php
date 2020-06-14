<?php

namespace App\Entity;

use App\Repository\AventurierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AventurierRepository::class)
 */
class Aventurier
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $race;

    /**
     * @ORM\Column(type="integer")
     */
    private $align;

    /**
     * @ORM\ManyToMany(targetEntity=Quest::class, inversedBy="aventuriers")
     */
    private $quests;

    /**
     * @ORM\OneToMany(targetEntity=Taverne::class, mappedBy="aventuriers")
     */
    private $tavernes;

    public function __construct()
    {
        $this->quests = new ArrayCollection();
        $this->tavernes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(string $race): self
    {
        $this->race = $race;

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
     * @return Collection|Quest[]
     */
    public function getQuests(): Collection
    {
        return $this->quests;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests[] = $quest;
        }

        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->contains($quest)) {
            $this->quests->removeElement($quest);
        }

        return $this;
    }

    /**
     * @return Collection|Taverne[]
     */
    public function getTavernes(): Collection
    {
        return $this->tavernes;
    }

    public function addTaverne(Taverne $taverne): self
    {
        if (!$this->tavernes->contains($taverne)) {
            $this->tavernes[] = $taverne;
            $taverne->setAventuriers($this);
        }

        return $this;
    }

    public function removeTaverne(Taverne $taverne): self
    {
        if ($this->tavernes->contains($taverne)) {
            $this->tavernes->removeElement($taverne);
            // set the owning side to null (unless already changed)
            if ($taverne->getAventuriers() === $this) {
                $taverne->setAventuriers(null);
            }
        }

        return $this;
    }
}
