<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les informations de transport
 */
trait TransportTrait
{
    #[ORM\Column]
    private ?bool $Transport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TypeTransport = null;

    #[ORM\Column(nullable: true)]
    private ?int $NumeroImmatriculationVehicule = null;

    public function getTransport(): ?bool
    {
        return $this->Transport;
    }

    public function setTransport(bool $Transport): static
    {
        $this->Transport = $Transport;
        return $this;
    }

    public function getTypeTransport(): ?string
    {
        return $this->TypeTransport;
    }

    public function setTypeTransport(?string $TypeTransport): static
    {
        $this->TypeTransport = $TypeTransport;
        return $this;
    }

    public function getNumeroImmatriculationVehicule(): ?int
    {
        return $this->NumeroImmatriculationVehicule;
    }

    public function setNumeroImmatriculationVehicule(?int $NumeroImmatriculationVehicule): static
    {
        $this->NumeroImmatriculationVehicule = $NumeroImmatriculationVehicule;
        return $this;
    }

    /**
     * Vérifie si l'utilisateur utilise un véhicule personnel
     */
    public function usesPersonalVehicle(): bool
    {
        return $this->Transport === true 
            && in_array($this->TypeTransport, ['voiture', 'moto', 'scooter']);
    }

    /**
     * Vérifie si les informations de transport sont complètes
     */
    public function hasCompleteTransportInfo(): bool
    {
        if (!$this->Transport) {
            return true; // Pas de transport = complet
        }

        // Si transport, doit avoir le type
        if (!$this->TypeTransport) {
            return false;
        }

        // Si véhicule personnel, doit avoir l'immatriculation
        if ($this->usesPersonalVehicle() && !$this->NumeroImmatriculationVehicule) {
            return false;
        }

        return true;
    }
}
