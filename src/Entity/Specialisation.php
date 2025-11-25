<?php

namespace App\Entity;

use App\Repository\SpecialisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialisationRepository::class)]
class Specialisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $duree = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $niveau = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $debouches = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $conditions_admission = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'est_specialisation')]
    private ?InformationEleve $informationEleve = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getInformationEleve(): ?InformationEleve
    {
        return $this->informationEleve;
    }

    public function setInformationEleve(?InformationEleve $informationEleve): static
    {
        $this->informationEleve = $informationEleve;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(?string $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getDebouches(): ?string
    {
        return $this->debouches;
    }

    public function setDebouches(?string $debouches): static
    {
        $this->debouches = $debouches;

        return $this;
    }

    public function getConditionsAdmission(): ?string
    {
        return $this->conditions_admission;
    }

    public function setConditionsAdmission(?string $conditions_admission): static
    {
        $this->conditions_admission = $conditions_admission;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }
}
