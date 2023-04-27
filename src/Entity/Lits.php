<?php

namespace App\Entity;

use App\Repository\LitsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LitsRepository::class)]
class Lits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $Etat = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Lit = null;

    #[ORM\ManyToOne(inversedBy: 'lits')]
    private ?Salle $Salle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isEtat(): ?bool
    {
        return $this->Etat;
    }

    public function setEtat(bool $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

    public function getNomLit(): ?string
    {
        return $this->Nom_Lit;
    }

    public function setNomLit(string $Nom_Lit): self
    {
        $this->Nom_Lit = $Nom_Lit;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->Salle;
    }

    public function setSalle(?Salle $Salle): self
    {
        $this->Salle = $Salle;

        return $this;
    }
}
