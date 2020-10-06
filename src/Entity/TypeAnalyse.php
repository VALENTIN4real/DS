<?php

namespace App\Entity;

use App\Repository\TypeAnalyseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeAnalyseRepository::class)
 */
class TypeAnalyse
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
    private $refTypeAnalyse;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $designationTypeAnalyse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $prixTypeAnalyse;

    /**
     * @ORM\OneToMany(targetEntity=Realiser::class, mappedBy="refTypeAnalyse")
     */
    private $realisers;

    public function __construct()
    {
        $this->realisers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefTypeAnalyse(): ?int
    {
        return $this->refTypeAnalyse;
    }

    public function setRefTypeAnalyse(int $refTypeAnalyse): self
    {
        $this->refTypeAnalyse = $refTypeAnalyse;

        return $this;
    }

    public function getDesignationTypeAnalyse(): ?string
    {
        return $this->designationTypeAnalyse;
    }

    public function setDesignationTypeAnalyse(string $designationTypeAnalyse): self
    {
        $this->designationTypeAnalyse = $designationTypeAnalyse;

        return $this;
    }

    public function getPrixTypeAnalyse(): ?string
    {
        return $this->prixTypeAnalyse;
    }

    public function setPrixTypeAnalyse(string $prixTypeAnalyse): self
    {
        $this->prixTypeAnalyse = $prixTypeAnalyse;

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
            $realiser->setRefTypeAnalyse($this);
        }

        return $this;
    }

    public function removeRealiser(Realiser $realiser): self
    {
        if ($this->realisers->contains($realiser)) {
            $this->realisers->removeElement($realiser);
            // set the owning side to null (unless already changed)
            if ($realiser->getRefTypeAnalyse() === $this) {
                $realiser->setRefTypeAnalyse(null);
            }
        }

        return $this;
    }
}
