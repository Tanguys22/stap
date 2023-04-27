<?php

namespace App\Entity;

use App\Repository\SuivieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuivieRepository::class)]
class Suivie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_sortie = null;

    #[ORM\ManyToMany(targetEntity: Salle::class, inversedBy: 'suivies')]
    private Collection $Salle;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_entre = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Patient $Patient = null;

    public function __construct()
    {
        $this->Salle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    /**
     * @return Collection<int, Salle>
     */
    public function getSalle(): Collection
    {
        return $this->Salle;
    }

    public function addSalle(Salle $salle): self
    {
        if (!$this->Salle->contains($salle)) {
            $this->Salle->add($salle);
        }

        return $this;
    }

    public function removeSalle(Salle $salle): self
    {
        $this->Salle->removeElement($salle);

        return $this;
    }

    public function getDateEntre(): ?\DateTimeInterface
    {
        return $this->date_entre;
    }

    public function setDateEntre(\DateTimeInterface $date_entre): self
    {
        $this->date_entre = $date_entre;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->Patient;
    }

    public function setPatient(?Patient $Patient): self
    {
        $this->Patient = $Patient;

        return $this;
    }
}
