<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les informations d'employeur
 * 
 * Propriétés fournies :
 * - profession (string)
 * - nom_employeur (string, nullable)
 * - adresse_employeur (string, nullable)
 * 
 * Méthodes fournies :
 * - hasEmployeur(): bool - Vérifie si les infos employeur sont renseignées
 * - getEmployeurComplet(): string - Retourne "Profession chez Employeur"
 */
trait EmployeurTrait
{
    #[ORM\Column(type: Types::STRING, length: 150)]
    private ?string $profession = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $nom_employeur = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $adresse_employeur = null;

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): static
    {
        $this->profession = $profession;
        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(?string $nom_employeur): static
    {
        $this->nom_employeur = $nom_employeur;
        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(?string $adresse_employeur): static
    {
        $this->adresse_employeur = $adresse_employeur;
        return $this;
    }

    /**
     * Vérifie si les informations d'employeur sont renseignées
     */
    public function hasEmployeur(): bool
    {
        return !empty($this->nom_employeur) || !empty($this->adresse_employeur);
    }

    /**
     * Retourne une description complète de l'emploi : "Profession chez Employeur"
     */
    public function getEmployeurComplet(): string
    {
        if (empty($this->profession) && empty($this->nom_employeur)) {
            return '';
        }

        if (!empty($this->profession) && !empty($this->nom_employeur)) {
            return $this->profession . ' chez ' . $this->nom_employeur;
        }

        return $this->profession ?? $this->nom_employeur ?? '';
    }
}
