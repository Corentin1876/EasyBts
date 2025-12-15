<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les autorisations (consentements RGPD)
 */
trait AutorisationsTrait
{
    #[ORM\Column]
    private ?bool $Autorisation_Droit_Image = null;

    #[ORM\Column]
    private ?bool $Acceptation_SMS = null;

    #[ORM\Column]
    private ?bool $AutorisationCommunication = null;

    public function getAutorisationDroitImage(): ?bool
    {
        return $this->Autorisation_Droit_Image;
    }

    public function setAutorisationDroitImage(bool $Autorisation_Droit_Image): static
    {
        $this->Autorisation_Droit_Image = $Autorisation_Droit_Image;
        return $this;
    }

    public function getAcceptationSMS(): ?bool
    {
        return $this->Acceptation_SMS;
    }

    public function setAcceptationSMS(bool $Acceptation_SMS): static
    {
        $this->Acceptation_SMS = $Acceptation_SMS;
        return $this;
    }

    public function getAutorisationCommunication(): ?bool
    {
        return $this->AutorisationCommunication;
    }

    public function setAutorisationCommunication(bool $AutorisationCommunication): static
    {
        $this->AutorisationCommunication = $AutorisationCommunication;
        return $this;
    }

    /**
     * Vérifie si toutes les autorisations sont accordées
     */
    public function hasAllAutorisations(): bool
    {
        return $this->Autorisation_Droit_Image === true
            && $this->Acceptation_SMS === true
            && $this->AutorisationCommunication === true;
    }

    /**
     * Accorde toutes les autorisations
     */
    public function grantAllAutorisations(): static
    {
        $this->Autorisation_Droit_Image = true;
        $this->Acceptation_SMS = true;
        $this->AutorisationCommunication = true;
        return $this;
    }

    /**
     * Révoque toutes les autorisations
     */
    public function revokeAllAutorisations(): static
    {
        $this->Autorisation_Droit_Image = false;
        $this->Acceptation_SMS = false;
        $this->AutorisationCommunication = false;
        return $this;
    }
}
