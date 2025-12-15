<?php

namespace App\Service;

use App\Entity\FormulaireInscription;

/**
 * Service pour gérer les statuts des formulaires d'inscription
 */
class FormulaireStatutService
{
    public const STATUT_BROUILLON = 'brouillon';
    public const STATUT_EN_ATTENTE = 'en_attente';
    public const STATUT_SOUMIS = 'soumis';
    public const STATUT_VALIDE = 'validé';
    public const STATUT_REJETE = 'rejeté';
    public const STATUT_A_MODIFIER = 'à modifier';

    public const STATUTS_MODIFIABLES = [
        self::STATUT_BROUILLON,
        self::STATUT_A_MODIFIER,
    ];

    public const STATUTS_FINALISES = [
        self::STATUT_SOUMIS,
        self::STATUT_VALIDE,
        self::STATUT_REJETE,
    ];

    /**
     * Vérifie si le formulaire est un brouillon
     */
    public function isBrouillon(FormulaireInscription $formulaire): bool
    {
        return $formulaire->getStatut() === self::STATUT_BROUILLON;
    }

    /**
     * Vérifie si le formulaire est validé
     */
    public function isValide(FormulaireInscription $formulaire): bool
    {
        return $formulaire->getStatut() === self::STATUT_VALIDE;
    }

    /**
     * Vérifie si le formulaire peut être modifié
     */
    public function isModifiable(FormulaireInscription $formulaire): bool
    {
        return in_array($formulaire->getStatut(), self::STATUTS_MODIFIABLES);
    }

    /**
     * Vérifie si le formulaire est finalisé (ne peut plus être modifié)
     */
    public function isFinalise(FormulaireInscription $formulaire): bool
    {
        return in_array($formulaire->getStatut(), self::STATUTS_FINALISES);
    }

    /**
     * Vérifie si le PDF peut être téléchargé
     */
    public function canDownloadPdf(FormulaireInscription $formulaire): bool
    {
        return $this->isValide($formulaire);
    }

    /**
     * Retourne le libellé du statut
     */
    public function getStatutLabel(string $statut): string
    {
        return match($statut) {
            self::STATUT_BROUILLON => '📝 Brouillon',
            self::STATUT_EN_ATTENTE => '⏳ En attente',
            self::STATUT_SOUMIS => '📤 Soumis',
            self::STATUT_VALIDE => '✅ Validé',
            self::STATUT_REJETE => '❌ Rejeté',
            self::STATUT_A_MODIFIER => '✏️ À modifier',
            default => '❓ Inconnu',
        };
    }

    /**
     * Retourne la classe CSS pour le badge de statut
     */
    public function getStatutBadgeClass(string $statut): string
    {
        return match($statut) {
            self::STATUT_BROUILLON => 'fr-badge--info',
            self::STATUT_EN_ATTENTE => 'fr-badge--warning',
            self::STATUT_SOUMIS => 'fr-badge--new',
            self::STATUT_VALIDE => 'fr-badge--success',
            self::STATUT_REJETE => 'fr-badge--error',
            self::STATUT_A_MODIFIER => 'fr-badge--warning',
            default => 'fr-badge',
        };
    }

    /**
     * Vérifie si le formulaire est complet
     */
    public function isComplet(FormulaireInscription $formulaire): bool
    {
        // Vérifier si tous les documents sont uploadés
        if (!$formulaire->hasAllDocuments()) {
            return false;
        }

        // Vérifier si le formulaire est signé
        if (!$formulaire->isEstSigne()) {
            return false;
        }

        // Vérifier si le brouillon existe et a des données
        if (!$formulaire->hasDraft()) {
            return false;
        }

        return true;
    }

    /**
     * Retourne les étapes manquantes du formulaire
     */
    public function getEtapesManquantes(FormulaireInscription $formulaire): array
    {
        $manquantes = [];

        if (!$formulaire->hasDraft()) {
            $manquantes[] = 'Formulaire non rempli';
        }

        $documentsManquants = $formulaire->getMissingDocuments();
        if (!empty($documentsManquants)) {
            $manquantes = array_merge($manquantes, $documentsManquants);
        }

        if (!$formulaire->isEstSigne()) {
            $manquantes[] = 'Signature manquante';
        }

        return $manquantes;
    }
}
