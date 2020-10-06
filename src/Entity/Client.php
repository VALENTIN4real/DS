<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $codeClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nomClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $rueClient;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codePostalClient;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $villeClient;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telClient;

    /**
     * @ORM\ManyToMany(targetEntity=Echantillon::class, mappedBy="codeClient")
     */
    private $echantillons;

    public function __construct()
    {
        $this->echantillons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeClient(): ?int
    {
        return $this->codeClient;
    }

    public function setCodeClient(int $codeClient): self
    {
        $this->codeClient = $codeClient;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getRueClient(): ?string
    {
        return $this->rueClient;
    }

    public function setRueClient(string $rueClient): self
    {
        $this->rueClient = $rueClient;

        return $this;
    }

    public function getCodePostalClient(): ?string
    {
        return $this->codePostalClient;
    }

    public function setCodePostalClient(string $codePostalClient): self
    {
        $this->codePostalClient = $codePostalClient;

        return $this;
    }

    public function getVilleClient(): ?string
    {
        return $this->villeClient;
    }

    public function setVilleClient(string $villeClient): self
    {
        $this->villeClient = $villeClient;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * @return Collection|Echantillon[]
     */
    public function getEchantillons(): Collection
    {
        return $this->echantillons;
    }

    public function addEchantillon(Echantillon $echantillon): self
    {
        if (!$this->echantillons->contains($echantillon)) {
            $this->echantillons[] = $echantillon;
            $echantillon->addCodeClient($this);
        }

        return $this;
    }

    public function removeEchantillon(Echantillon $echantillon): self
    {
        if ($this->echantillons->contains($echantillon)) {
            $this->echantillons->removeElement($echantillon);
            $echantillon->removeCodeClient($this);
        }

        return $this;
    }
}
