<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les informations d'adresse postale
 * 
 * Propriétés fournies :
 * - adresse (string)
 * - code_postal (string)
 * - ville (string)
 * 
 * Méthodes fournies :
 * - getAdresseComplete(): string - Retourne l'adresse formatée
 * - hasAdresseComplete(): bool - Vérifie si toutes les infos sont renseignées
 */
trait AdresseTrait
{
    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::STRING, length: 10)]
    private ?string $code_postal = null;

    #[ORM\Column(type: Types::STRING, length: 100)]
    private ?string $ville = null;

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): static
    {
        $this->code_postal = $code_postal;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * Retourne l'adresse complète formatée
     */
    public function getAdresseComplete(): string
    {
        $parts = array_filter([
            $this->adresse,
            $this->code_postal ? $this->code_postal . ' ' . $this->ville : $this->ville
        ]);

        return implode(', ', $parts);
    }

    /**
     * Vérifie si toutes les informations d'adresse sont renseignées
     */
    public function hasAdresseComplete(): bool
    {
        return !empty($this->adresse) 
            && !empty($this->code_postal) 
            && !empty($this->ville);
    }
}
