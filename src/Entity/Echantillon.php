<?php

namespace App\Entity;

use App\Repository\EchantillonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EchantillonRepository::class)
 */
class Echantillon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeEchantillon;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEntree;

    /**
     * @ORM\ManyToMany(targetEntity=Client::class, inversedBy="echantillons")
     */
    private $codeClient;

    /**
     * @ORM\OneToMany(targetEntity=Realiser::class, mappedBy="codeEchantillon")
     */
    private $realisers;

    public function __construct()
    {
        $this->codeClient = new ArrayCollection();
        $this->realisers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeEchantillon(): ?int
    {
        return $this->codeEchantillon;
    }

    public function setCodeEchantillon(int $codeEchantillon): self
    {
        $this->codeEchantillon = $codeEchantillon;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getCodeClient(): Collection
    {
        return $this->codeClient;
    }

    public function addCodeClient(Client $codeClient): self
    {
        if (!$this->codeClient->contains($codeClient)) {
            $this->codeClient[] = $codeClient;
        }

        return $this;
    }

    public function removeCodeClient(Client $codeClient): self
    {
        if ($this->codeClient->contains($codeClient)) {
            $this->codeClient->removeElement($codeClient);
        }

        return $this;
    }

    /**
     * @return Collection|Realiser[]
     */
    public function getRealisers(): Collection
    {
        return $this->realisers;
    }

    public function addRealiser(Realiser $realiser): self
    {
        if (!$this->realisers->contains($realiser)) {
            $this->realisers[] = $realiser;
            $realiser->setCodeEchantillon($this);
        }

        return $this;
    }

    public function removeRealiser(Realiser $realiser): self
    {
        if ($this->realisers->contains($realiser)) {
            $this->realisers->removeElement($realiser);
            // set the owning side to null (unless already changed)
            if ($realiser->getCodeEchantillon() === $this) {
                $realiser->setCodeEchantillon(null);
            }
        }

        return $this;
    }
}
