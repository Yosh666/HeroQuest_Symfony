<?php

namespace App\Entity;

use App\Repository\TaverneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaverneRepository::class)
 */
class Taverne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $lvl;

    /**
     * @ORM\ManyToOne(targetEntity=Aventurier::class, inversedBy="tavernes")
     */
    private $aventuriers;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="tavernes")
     */
    private $classes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getAventuriers(): ?Aventurier
    {
        return $this->aventuriers;
    }

    public function setAventuriers(?Aventurier $aventuriers): self
    {
        $this->aventuriers = $aventuriers;

        return $this;
    }

    public function getClasses(): ?Classe
    {
        return $this->classes;
    }

    public function setClasses(?Classe $classes): self
    {
        $this->classes = $classes;

        return $this;
    }
}
