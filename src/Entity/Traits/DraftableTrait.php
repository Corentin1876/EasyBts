<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait pour gérer le système de brouillon (draft)
 */
trait DraftableTrait
{
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $draft_json = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $draft_step = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $draft_updated_at = null;

    public function getDraftJson(): ?string
    {
        return $this->draft_json;
    }

    public function setDraftJson(?string $draft_json): static
    {
        $this->draft_json = $draft_json;
        return $this;
    }

    public function getDraftStep(): ?int
    {
        return $this->draft_step;
    }

    public function setDraftStep(?int $draft_step): static
    {
        $this->draft_step = $draft_step;
        return $this;
    }

    public function getDraftUpdatedAt(): ?\DateTimeInterface
    {
        return $this->draft_updated_at;
    }

    public function setDraftUpdatedAt(?\DateTimeInterface $draft_updated_at): static
    {
        $this->draft_updated_at = $draft_updated_at;
        return $this;
    }

    /**
     * Décode les données JSON du brouillon
     */
    public function getDraftData(): ?array
    {
        if (!$this->draft_json) {
            return null;
        }

        return json_decode($this->draft_json, true);
    }

    /**
     * Encode les données du brouillon en JSON
     */
    public function setDraftData(array $data): static
    {
        $this->draft_json = json_encode($data);
        $this->draft_updated_at = new \DateTime();
        return $this;
    }

    /**
     * Vérifie si un brouillon existe
     */
    public function hasDraft(): bool
    {
        return $this->draft_json !== null;
    }

    /**
     * Supprime le brouillon
     */
    public function clearDraft(): static
    {
        $this->draft_json = null;
        $this->draft_step = null;
        $this->draft_updated_at = null;
        return $this;
    }
}
