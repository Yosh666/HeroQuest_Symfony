<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 */
class Classe
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
     * @ORM\ManyToOne(targetEntity=Voie::class, inversedBy="classes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voie;

    /**
     * @ORM\OneToMany(targetEntity=Taverne::class, mappedBy="classes")
     */
    private $tavernes;

    public function __construct()
    {
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

    public function getVoie(): ?Voie
    {
        return $this->voie;
    }

    public function setVoie(?Voie $voie): self
    {
        $this->voie = $voie;

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
            $taverne->setClasses($this);
        }

        return $this;
    }

    public function removeTaverne(Taverne $taverne): self
    {
        if ($this->tavernes->contains($taverne)) {
            $this->tavernes->removeElement($taverne);
            // set the owning side to null (unless already changed)
            if ($taverne->getClasses() === $this) {
                $taverne->setClasses(null);
            }
        }

        return $this;
    }
}
