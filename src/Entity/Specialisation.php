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
}
