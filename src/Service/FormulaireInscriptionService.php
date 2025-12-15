<?php

namespace App\Service;

use App\Entity\FormulaireInscription;
use App\Entity\Utilisateur;
use App\Entity\Specialisation;
use Doctrine\ORM\EntityManagerInterface;

class FormulaireInscriptionService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    /**
     * Trouve un brouillon existant pour un utilisateur
     */
    public function findBrouillon(Utilisateur $user): ?FormulaireInscription
    {
        $repo = $this->entityManager->getRepository(FormulaireInscription::class);
        
        // Chercher un brouillon
        $brouillon = $repo->findOneBy([
            'remplit_formulaire' => $user,
            'statut' => 'brouillon',
        ]);
        
        // Si pas de brouillon, chercher un dossier à modifier
        if (!$brouillon) {
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'à modifier',
            ]);
        }
        
        return $brouillon;
    }

    /**
     * Trouve un dossier soumis pour un utilisateur
     */
    public function findDossierSoumis(Utilisateur $user): ?FormulaireInscription
    {
        $repo = $this->entityManager->getRepository(FormulaireInscription::class);
        
        return $repo->findOneBy([
            'remplit_formulaire' => $user,
            'statut' => ['soumis', 'validé', 'rejeté'],
        ]);
    }

    /**
     * Trouve un formulaire par type et utilisateur
     */
    public function findByTypeAndUser(string $type, Utilisateur $user): ?FormulaireInscription
    {
        $repo = $this->entityManager->getRepository(FormulaireInscription::class);
        
        return $repo->findOneBy([
            'remplit_formulaire' => $user,
            'type_formulaire' => $type,
        ]);
    }

    /**
     * Vérifie si un formulaire peut être modifié
     */
    public function canBeModified(?FormulaireInscription $formulaire): bool
    {
        if (!$formulaire) {
            return true;
        }
        
        return !in_array($formulaire->getStatut(), ['soumis', 'validé', 'rejeté']);
    }

    /**
     * Supprime un brouillon
     */
    public function deleteBrouillon(Utilisateur $user): bool
    {
        $brouillon = $this->findBrouillon($user);
        
        if ($brouillon) {
            $this->entityManager->remove($brouillon);
            $this->entityManager->flush();
            return true;
        }
        
        return false;
    }

    /**
     * Crée un nouveau brouillon
     */
    public function createBrouillon(Utilisateur $user, string $typeFormulaire): FormulaireInscription
    {
        $formulaire = new FormulaireInscription();
        $formulaire->setRemplitFormulaire($user);
        $formulaire->setTypeFormulaire($typeFormulaire);
        $formulaire->setStatut('brouillon');
        $formulaire->setEstSigne(false);
        $formulaire->setDateSoumission(new \DateTime());
        
        $this->entityManager->persist($formulaire);
        
        return $formulaire;
    }

    /**
     * Sauvegarde la progression d'un formulaire
     */
    public function saveProgress(
        FormulaireInscription $formulaire,
        array $formData,
        int $currentStep
    ): void {
        $formulaire->setDraftJson(json_encode($formData));
        $formulaire->setDraftStep($currentStep);
        $formulaire->setDraftUpdatedAt(new \DateTime());
        
        $this->entityManager->flush();
    }
}
