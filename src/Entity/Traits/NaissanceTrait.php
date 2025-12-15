<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les informations de naissance
 */
trait NaissanceTrait
{
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Naissance_Departement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Naissance_Commune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nationalite = null;

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }

    public function getNaissanceDepartement(): ?string
    {
        return $this->Naissance_Departement;
    }

    public function setNaissanceDepartement(?string $Naissance_Departement): static
    {
        $this->Naissance_Departement = $Naissance_Departement;
        return $this;
    }

    public function getNaissanceCommune(): ?string
    {
        return $this->Naissance_Commune;
    }

    public function setNaissanceCommune(?string $Naissance_Commune): static
    {
        $this->Naissance_Commune = $Naissance_Commune;
        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->Nationalite;
    }

    public function setNationalite(?string $Nationalite): static
    {
        $this->Nationalite = $Nationalite;
        return $this;
    }

    /**
     * Retourne le lieu de naissance complet
     */
    public function getLieuNaissanceComplet(): string
    {
        $parts = array_filter([
            $this->Naissance_Commune,
            $this->Naissance_Departement,
        ]);

        return implode(', ', $parts) ?: 'Non renseigné';
    }

    /**
     * Calcule l'âge à partir de la date de naissance
     */
    public function getAge(): ?int
    {
        if (!$this->date_naissance) {
            return null;
        }

        return $this->date_naissance->diff(new \DateTime())->y;
    }

    /**
     * Vérifie si la personne est majeure
     */
    public function isMajeur(): bool
    {
        $age = $this->getAge();
        return $age !== null && $age >= 18;
    }
}
