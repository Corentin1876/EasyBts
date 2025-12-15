<?php

namespace App\Service;

use App\Entity\Utilisateur;
use App\Entity\FormulaireInscription;

class FormDataPreparationService
{
    /**
     * Prépare les données par défaut depuis l'utilisateur
     */
    public function getDefaultDataFromUser(Utilisateur $user): array
    {
        return [
            'nom' => $user->getNom() ?? '',
            'prenom' => $user->getPrenom() ?? '',
            'email_eleve' => $user->getEmail() ?? '',
            'tel_eleve' => $user->getTelephone() ?? '',
            'date_naissance' => $user->getDateNaissance() ? $user->getDateNaissance()->format('Y-m-d') : '',
            'adresse_resp1' => $user->getAdresse() ?? '',
            'sexe' => $user->getUser() ?? '',
        ];
    }

    /**
     * Fusionne les données du brouillon avec les données par défaut
     */
    public function mergeBrouillonData(FormulaireInscription $brouillon, array $defaultData): array
    {
        $brouillonData = $brouillon->getDraftJson() ? json_decode($brouillon->getDraftJson(), true) : [];
        $mergedData = array_merge($defaultData, $brouillonData);
        
        // Ajouter les chemins des documents uploadés
        if ($brouillon->getCarteIdentiteRecto()) {
            $mergedData['carte_identite_recto_path'] = $brouillon->getCarteIdentiteRecto();
        }
        if ($brouillon->getCarteIdentiteVerso()) {
            $mergedData['carte_identite_verso_path'] = $brouillon->getCarteIdentiteVerso();
        }
        if ($brouillon->getJustificatifDomicile()) {
            $mergedData['justificatif_domicile_path'] = $brouillon->getJustificatifDomicile();
        }
        if ($brouillon->getRelevesNotes()) {
            $mergedData['releves_notes_path'] = $brouillon->getRelevesNotes();
        }
        
        return $mergedData;
    }

    /**
     * Prépare les données sauvegardées pour le frontend
     */
    public function prepareSavedDataJson(
        ?FormulaireInscription $brouillon,
        Utilisateur $user
    ): string {
        $defaultData = $this->getDefaultDataFromUser($user);
        
        if ($brouillon && $brouillon->getStatut() === 'brouillon') {
            $mergedData = $this->mergeBrouillonData($brouillon, $defaultData);
            
            return json_encode([
                'currentStep' => $brouillon->getDraftStep(),
                'formData' => $mergedData
            ]);
        }
        
        // Première fois : utiliser les données de l'utilisateur
        return json_encode([
            'currentStep' => 1,
            'formData' => $defaultData
        ]);
    }
}
