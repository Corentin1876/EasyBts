<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les informations de contact (téléphone, email)
 * 
 * Propriétés fournies :
 * - telephone_mobile (string)
 * - telephone_domicile (string, nullable)
 * - telephone_travail (string, nullable)
 * - email (string)
 * 
 * Méthodes fournies :
 * - getTelephonePrincipal(): ?string - Retourne le premier téléphone disponible
 * - hasEmail(): bool - Vérifie si l'email est renseigné
 * - hasAnyTelephone(): bool - Vérifie si au moins un téléphone existe
 * - formatTelephone(string): string - Formate un numéro français (01 23 45 67 89)
 */
trait ContactInfoTrait
{
    #[ORM\Column(type: Types::STRING, length: 20)]
    private ?string $telephone_mobile = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $telephone_domicile = null;

    #[ORM\Column(type: Types::STRING, length: 20, nullable: true)]
    private ?string $telephone_travail = null;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $email = null;

    public function getTelephoneMobile(): ?string
    {
        return $this->telephone_mobile;
    }

    public function setTelephoneMobile(?string $telephone_mobile): static
    {
        $this->telephone_mobile = $telephone_mobile;
        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->telephone_domicile;
    }

    public function setTelephoneDomicile(?string $telephone_domicile): static
    {
        $this->telephone_domicile = $telephone_domicile;
        return $this;
    }

    public function getTelephoneTravail(): ?string
    {
        return $this->telephone_travail;
    }

    public function setTelephoneTravail(?string $telephone_travail): static
    {
        $this->telephone_travail = $telephone_travail;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Retourne le premier numéro de téléphone disponible (mobile > domicile > travail)
     */
    public function getTelephonePrincipal(): ?string
    {
        return $this->telephone_mobile 
            ?? $this->telephone_domicile 
            ?? $this->telephone_travail;
    }

    /**
     * Vérifie si un email est renseigné
     */
    public function hasEmail(): bool
    {
        return !empty($this->email);
    }

    /**
     * Vérifie si au moins un numéro de téléphone est renseigné
     */
    public function hasAnyTelephone(): bool
    {
        return !empty($this->telephone_mobile)
            || !empty($this->telephone_domicile)
            || !empty($this->telephone_travail);
    }

    /**
     * Formate un numéro de téléphone français (10 chiffres) : 01 23 45 67 89
     */
    public function formatTelephone(?string $telephone): string
    {
        if (empty($telephone)) {
            return '';
        }

        // Enlève tous les caractères non numériques
        $cleaned = preg_replace('/[^0-9]/', '', $telephone);

        // Formate si exactement 10 chiffres
        if (strlen($cleaned) === 10) {
            return substr($cleaned, 0, 2) . ' ' 
                 . substr($cleaned, 2, 2) . ' ' 
                 . substr($cleaned, 4, 2) . ' ' 
                 . substr($cleaned, 6, 2) . ' ' 
                 . substr($cleaned, 8, 2);
        }

        return $telephone;
    }
}
