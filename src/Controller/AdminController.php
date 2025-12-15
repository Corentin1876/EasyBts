<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\FormulaireInscription;
use App\Entity\PasswordResetToken;
use App\Entity\AdhesionMDL;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/utilisateurs', name: 'app_admin_utilisateurs')]
    public function utilisateurs(EntityManagerInterface $entityManager): Response
    {
        $utilisateurs = $entityManager->getRepository(Utilisateur::class)->findAll();

        return $this->render('admin/utilisateurs.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }

    #[Route('/utilisateur/{id}/toggle-role', name: 'app_admin_toggle_role')]
    public function toggleRole(Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $roles = $utilisateur->getRoles();
        
        if (in_array('ROLE_ADMIN', $roles)) {
            // Retirer ROLE_ADMIN (garder ROLE_USER)
            $utilisateur->setRoles(['ROLE_USER']);
            $this->addFlash('success', 'Le rôle administrateur a été retiré à ' . $utilisateur->getPrenom() . ' ' . $utilisateur->getNom());
        } else {
            // Ajouter ROLE_ADMIN
            $utilisateur->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
            $this->addFlash('success', $utilisateur->getPrenom() . ' ' . $utilisateur->getNom() . ' est maintenant administrateur');
        }

        $entityManager->flush();

        return $this->redirectToRoute('app_admin_utilisateurs');
    }

    #[Route('/utilisateur/{id}/delete', name: 'app_admin_delete_user', methods: ['POST'])]
    public function deleteUser(Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $nom = $utilisateur->getPrenom() . ' ' . $utilisateur->getNom();
        
        // Supprimer d'abord tous les tokens de réinitialisation de mot de passe
        $tokens = $entityManager->getRepository(PasswordResetToken::class)->findBy(['utilisateur' => $utilisateur]);
        foreach ($tokens as $token) {
            $entityManager->remove($token);
        }
        
        // Supprimer ensuite tous les formulaires d'inscription associés
        $formulaires = $utilisateur->getFormulaireInscriptions();
        foreach ($formulaires as $formulaire) {
            $entityManager->remove($formulaire);
        }
        
        // Enfin, supprimer l'utilisateur
        $entityManager->remove($utilisateur);
        $entityManager->flush();

        $this->addFlash('success', 'L\'utilisateur ' . $nom . ' a été supprimé');

        return $this->redirectToRoute('app_admin_utilisateurs');
    }

    #[Route('/dossiers-bts', name: 'app_admin_dossiers_bts')]
    public function dossiersBts(EntityManagerInterface $entityManager): Response
    {
        // Récupérer tous les formulaires avec statut 'soumis' ou 'validé'
        $dossiers = $entityManager->getRepository(FormulaireInscription::class)
            ->createQueryBuilder('f')
            ->where('f.statut = :soumis OR f.statut = :valide')
            ->setParameter('soumis', 'soumis')
            ->setParameter('valide', 'validé')
            ->orderBy('f.date_soumission', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/dossiers_bts.html.twig', [
            'dossiers' => $dossiers,
        ]);
    }

    #[Route('/dossier-bts/{id}', name: 'app_admin_dossier_detail')]
    public function dossierDetail(FormulaireInscription $formulaire): Response
    {
        $data = json_decode($formulaire->getDraftJson(), true) ?? [];

        return $this->render('admin/dossier_detail.html.twig', [
            'formulaire' => $formulaire,
            'data' => $data,
        ]);
    }

    #[Route('/dossier-bts/{id}/valider', name: 'app_admin_dossier_valider')]
    public function validerDossier(FormulaireInscription $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('validé');
        $entityManager->flush();

        $this->addFlash('success', 'Le dossier de ' . $formulaire->getRemplitFormulaire()->getPrenom() . ' ' . $formulaire->getRemplitFormulaire()->getNom() . ' a été validé');

        return $this->redirectToRoute('app_admin_dossiers_bts');
    }

    #[Route('/dossier-bts/{id}/rejeter', name: 'app_admin_dossier_rejeter')]
    public function rejeterDossier(FormulaireInscription $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('rejeté');
        $entityManager->flush();

        $this->addFlash('success', 'Le dossier de ' . $formulaire->getRemplitFormulaire()->getPrenom() . ' ' . $formulaire->getRemplitFormulaire()->getNom() . ' a été rejeté');

        return $this->redirectToRoute('app_admin_dossiers_bts');
    }

    #[Route('/dossier-bts/{id}/modifier', name: 'app_admin_dossier_modifier')]
    public function demanderModification(FormulaireInscription $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('à modifier');
        $entityManager->flush();

        $this->addFlash('warning', 'Une demande de modification a été envoyée à ' . $formulaire->getRemplitFormulaire()->getPrenom() . ' ' . $formulaire->getRemplitFormulaire()->getNom());

        return $this->redirectToRoute('app_admin_dossiers_bts');
    }

    #[Route('/formulaires-supplementaires', name: 'app_admin_formulaires_supplementaires')]
    public function formulairesSupplementaires(EntityManagerInterface $entityManager): Response
    {
        // Récupérer toutes les adhésions MDL
        $adhesionsMDL = $entityManager->getRepository(AdhesionMDL::class)
            ->createQueryBuilder('a')
            ->where('a.statut = :soumis OR a.statut = :valide')
            ->setParameter('soumis', 'soumis')
            ->setParameter('valide', 'validé')
            ->orderBy('a.date_soumission', 'DESC')
            ->getQuery()
            ->getResult();

        // TODO: Récupérer les autres formulaires (intendance, fiche d'urgence) quand ils seront créés

        return $this->render('admin/formulaires_supplementaires.html.twig', [
            'adhesionsMDL' => $adhesionsMDL,
        ]);
    }

    #[Route('/adhesion-mdl/{id}/valider', name: 'app_admin_adhesion_mdl_valider')]
    public function validerAdhesionMDL(AdhesionMDL $adhesion, EntityManagerInterface $entityManager): Response
    {
        $adhesion->setStatut('validé');
        $entityManager->flush();

        $this->addFlash('success', 'L\'adhésion MDL de ' . $adhesion->getPrenom() . ' ' . $adhesion->getNom() . ' a été validée');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/adhesion-mdl/{id}/rejeter', name: 'app_admin_adhesion_mdl_rejeter')]
    public function rejeterAdhesionMDL(AdhesionMDL $adhesion, EntityManagerInterface $entityManager): Response
    {
        $adhesion->setStatut('rejeté');
        $entityManager->flush();

        $this->addFlash('success', 'L\'adhésion MDL de ' . $adhesion->getPrenom() . ' ' . $adhesion->getNom() . ' a été rejetée');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/adhesion-mdl/{id}/modifier', name: 'app_admin_adhesion_mdl_modifier')]
    public function demanderModificationAdhesionMDL(AdhesionMDL $adhesion, EntityManagerInterface $entityManager): Response
    {
        $adhesion->setStatut('à modifier');
        $entityManager->flush();

        $this->addFlash('warning', 'Une demande de modification a été envoyée pour l\'adhésion MDL de ' . $adhesion->getPrenom() . ' ' . $adhesion->getNom());

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }
}
