<?php

namespace App\Entity;

use App\Repository\RealiserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealiserRepository::class)
 */
class Realiser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Echantillon::class, inversedBy="realisers")
     */
    private $codeEchantillon;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAnalyse::class, inversedBy="realisers")
     */
    private $refTypeAnalyse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRealisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeEchantillon(): ?Echantillon
    {
        return $this->codeEchantillon;
    }

    public function setCodeEchantillon(?Echantillon $codeEchantillon): self
    {
        $this->codeEchantillon = $codeEchantillon;

        return $this;
    }

    public function getRefTypeAnalyse(): ?TypeAnalyse
    {
        return $this->refTypeAnalyse;
    }

    public function setRefTypeAnalyse(?TypeAnalyse $refTypeAnalyse): self
    {
        $this->refTypeAnalyse = $refTypeAnalyse;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(\DateTimeInterface $dateRealisation): self
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }
}
