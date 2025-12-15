<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer les documents uploadés
 */
trait DocumentsTrait
{
    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $carte_identite_recto = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $carte_identite_verso = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $justificatif_domicile = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $releves_notes = null;

    public function getCarteIdentiteRecto(): ?string
    {
        return $this->carte_identite_recto;
    }

    public function setCarteIdentiteRecto(?string $carte_identite_recto): static
    {
        $this->carte_identite_recto = $carte_identite_recto;
        return $this;
    }

    public function getCarteIdentiteVerso(): ?string
    {
        return $this->carte_identite_verso;
    }

    public function setCarteIdentiteVerso(?string $carte_identite_verso): static
    {
        $this->carte_identite_verso = $carte_identite_verso;
        return $this;
    }

    public function getJustificatifDomicile(): ?string
    {
        return $this->justificatif_domicile;
    }

    public function setJustificatifDomicile(?string $justificatif_domicile): static
    {
        $this->justificatif_domicile = $justificatif_domicile;
        return $this;
    }

    public function getRelevesNotes(): ?string
    {
        return $this->releves_notes;
    }

    public function setRelevesNotes(?string $releves_notes): static
    {
        $this->releves_notes = $releves_notes;
        return $this;
    }

    /**
     * Vérifie si tous les documents requis sont uploadés
     */
    public function hasAllDocuments(): bool
    {
        return $this->carte_identite_recto !== null
            && $this->carte_identite_verso !== null
            && $this->justificatif_domicile !== null
            && $this->releves_notes !== null;
    }

    /**
     * Retourne la liste des documents manquants
     */
    public function getMissingDocuments(): array
    {
        $missing = [];

        if (!$this->carte_identite_recto) {
            $missing[] = 'Carte d\'identité (recto)';
        }
        if (!$this->carte_identite_verso) {
            $missing[] = 'Carte d\'identité (verso)';
        }
        if (!$this->justificatif_domicile) {
            $missing[] = 'Justificatif de domicile';
        }
        if (!$this->releves_notes) {
            $missing[] = 'Relevés de notes';
        }

        return $missing;
    }

    /**
     * Retourne tous les chemins de documents
     */
    public function getAllDocumentPaths(): array
    {
        return array_filter([
            'carte_identite_recto' => $this->carte_identite_recto,
            'carte_identite_verso' => $this->carte_identite_verso,
            'justificatif_domicile' => $this->justificatif_domicile,
            'releves_notes' => $this->releves_notes,
        ]);
    }
}
