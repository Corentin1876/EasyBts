<?php

namespace App\Entity;

use App\Repository\AnneeScolaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnneeScolaireRepository::class)]
class AnneeScolaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Date = null;

    #[ORM\ManyToOne(inversedBy: 'concernant_annee_scolaire')]
    private ?InformationEleve $informationEleve = null;

    #[ORM\ManyToOne(inversedBy: 'concerne_annee_scolaire')]
    private ?ScolariteDes2AnneeAnterieur $scolariteDes2AnneeAnterieur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->Date;
    }

    public function setDate(\DateTime $Date): static
    {
        $this->Date = $Date;

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

    public function getScolariteDes2AnneeAnterieur(): ?ScolariteDes2AnneeAnterieur
    {
        return $this->scolariteDes2AnneeAnterieur;
    }

    public function setScolariteDes2AnneeAnterieur(?ScolariteDes2AnneeAnterieur $scolariteDes2AnneeAnterieur): static
    {
        $this->scolariteDes2AnneeAnterieur = $scolariteDes2AnneeAnterieur;

        return $this;
    }
}
