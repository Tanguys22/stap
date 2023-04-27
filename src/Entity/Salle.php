<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre_Lit = null;

    #[ORM\Column(length: 255)]
    private ?string $NbLits_occupe = null;

    #[ORM\Column(length: 255)]
    private ?string $Services = null;

    #[ORM\ManyToMany(targetEntity: Suivie::class, mappedBy: 'Salle')]
    private Collection $suivies;

    #[ORM\OneToMany(mappedBy: 'Salle', targetEntity: Lits::class)]
    private Collection $lits;

    public function __construct()
    {
        $this->suivies = new ArrayCollection();
        $this->lits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNombreLit(): ?string
    {
        return $this->Nombre_Lit;
    }

    public function setNombreLit(string $Nombre_Lit): self
    {
        $this->Nombre_Lit = $Nombre_Lit;

        return $this;
    }

    public function getNbLitsOccupe(): ?string
    {
        return $this->NbLits_occupe;
    }

    public function setNbLitsOccupe(string $NbLits_occupe): self
    {
        $this->NbLits_occupe = $NbLits_occupe;

        return $this;
    }

    public function getServices(): ?string
    {
        return $this->Services;
    }

    public function setServices(string $Services): self
    {
        $this->Services = $Services;

        return $this;
    }

    /**
     * @return Collection<int, Suivie>
     */
    public function getSuivies(): Collection
    {
        return $this->suivies;
    }

    public function addSuivy(Suivie $suivy): self
    {
        if (!$this->suivies->contains($suivy)) {
            $this->suivies->add($suivy);
            $suivy->addSalle($this);
        }

        return $this;
    }

    public function removeSuivy(Suivie $suivy): self
    {
        if ($this->suivies->removeElement($suivy)) {
            $suivy->removeSalle($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Lits>
     */
    public function getLits(): Collection
    {
        return $this->lits;
    }

    public function addLit(Lits $lit): self
    {
        if (!$this->lits->contains($lit)) {
            $this->lits->add($lit);
            $lit->setSalle($this);
        }

        return $this;
    }

    public function removeLit(Lits $lit): self
    {
        if ($this->lits->removeElement($lit)) {
            // set the owning side to null (unless already changed)
            if ($lit->getSalle() === $this) {
                $lit->setSalle(null);
            }
        }

        return $this;
    }

}
