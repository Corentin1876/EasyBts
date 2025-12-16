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
            ->where('a.statut = :soumis OR a.statut = :valide OR a.statut = :modifier')
            ->setParameter('soumis', 'soumis')
            ->setParameter('valide', 'validé')
            ->setParameter('modifier', 'à modifier')
            ->orderBy('a.date_soumission', 'DESC')
            ->getQuery()
            ->getResult();

        // Récupérer toutes les fiches d'urgence
        $fichesUrgence = $entityManager->getRepository(\App\Entity\FicheUrgence::class)
            ->createQueryBuilder('f')
            ->where('f.statut = :soumis OR f.statut = :valide OR f.statut = :modifier')
            ->setParameter('soumis', 'soumis')
            ->setParameter('valide', 'validé')
            ->setParameter('modifier', 'à modifier')
            ->orderBy('f.date_soumission', 'DESC')
            ->getQuery()
            ->getResult();

        // Récupérer tous les formulaires d'intendance
        $formulairesIntendance = $entityManager->getRepository(\App\Entity\FormulaireIntendance::class)
            ->createQueryBuilder('fi')
            ->where('fi.statut = :soumis OR fi.statut = :valide OR fi.statut = :modifier')
            ->setParameter('soumis', 'soumis')
            ->setParameter('valide', 'validé')
            ->setParameter('modifier', 'à modifier')
            ->orderBy('fi.date_soumission', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin/formulaires_supplementaires.html.twig', [
            'adhesionsMDL' => $adhesionsMDL,
            'fichesUrgence' => $fichesUrgence,
            'formulairesIntendance' => $formulairesIntendance,
        ]);
    }

    #[Route('/adhesion-mdl/{id}/detail', name: 'app_admin_adhesion_mdl_detail')]
    public function detailAdhesionMDL(AdhesionMDL $adhesion): Response
    {
        return $this->render('admin/adhesion_mdl_detail.html.twig', [
            'adhesion' => $adhesion,
        ]);
    }

    #[Route('/fiche-urgence/{id}/detail', name: 'app_admin_fiche_urgence_detail')]
    public function detailFicheUrgence(\App\Entity\FicheUrgence $fiche): Response
    {
        return $this->render('admin/fiche_urgence_detail.html.twig', [
            'fiche' => $fiche,
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

    #[Route('/fiche-urgence/{id}/valider', name: 'app_admin_fiche_urgence_valider')]
    public function validerFicheUrgence(\App\Entity\FicheUrgence $fiche, EntityManagerInterface $entityManager): Response
    {
        $fiche->setStatut('validé');
        $entityManager->flush();

        $this->addFlash('success', 'La fiche d\'urgence de ' . $fiche->getPrenomEtudiant() . ' ' . $fiche->getNomEtudiant() . ' a été validée');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/fiche-urgence/{id}/rejeter', name: 'app_admin_fiche_urgence_rejeter')]
    public function rejeterFicheUrgence(\App\Entity\FicheUrgence $fiche, EntityManagerInterface $entityManager): Response
    {
        $fiche->setStatut('rejeté');
        $entityManager->flush();

        $this->addFlash('success', 'La fiche d\'urgence de ' . $fiche->getPrenomEtudiant() . ' ' . $fiche->getNomEtudiant() . ' a été rejetée');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/fiche-urgence/{id}/modifier', name: 'app_admin_fiche_urgence_modifier')]
    public function demanderModificationFicheUrgence(\App\Entity\FicheUrgence $fiche, EntityManagerInterface $entityManager): Response
    {
        $fiche->setStatut('à modifier');
        $entityManager->flush();

        $this->addFlash('warning', 'Une demande de modification a été envoyée pour la fiche d\'urgence de ' . $fiche->getPrenomEtudiant() . ' ' . $fiche->getNomEtudiant());

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/formulaire-intendance/{id}', name: 'app_admin_formulaire_intendance_detail')]
    public function formulaireIntendanceDetail(\App\Entity\FormulaireIntendance $formulaire): Response
    {
        return $this->render('admin/formulaire_intendance_detail.html.twig', [
            'formulaire' => $formulaire,
        ]);
    }

    #[Route('/formulaire-intendance/{id}/valider', name: 'app_admin_valider_formulaire_intendance')]
    public function validerFormulaireIntendance(\App\Entity\FormulaireIntendance $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('validé');
        $entityManager->flush();

        $this->addFlash('success', 'Le formulaire d\'intendance de ' . $formulaire->getPrenomEtudiant() . ' ' . $formulaire->getNomEtudiant() . ' a été validé');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/formulaire-intendance/{id}/rejeter', name: 'app_admin_rejeter_formulaire_intendance')]
    public function rejeterFormulaireIntendance(\App\Entity\FormulaireIntendance $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('rejeté');
        $entityManager->flush();

        $this->addFlash('error', 'Le formulaire d\'intendance de ' . $formulaire->getPrenomEtudiant() . ' ' . $formulaire->getNomEtudiant() . ' a été rejeté');

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }

    #[Route('/formulaire-intendance/{id}/modifier', name: 'app_admin_demander_modification_formulaire_intendance')]
    public function demanderModificationFormulaireIntendance(\App\Entity\FormulaireIntendance $formulaire, EntityManagerInterface $entityManager): Response
    {
        $formulaire->setStatut('à modifier');
        $entityManager->flush();

        $this->addFlash('warning', 'Une demande de modification a été envoyée pour le formulaire d\'intendance de ' . $formulaire->getPrenomEtudiant() . ' ' . $formulaire->getNomEtudiant());

        return $this->redirectToRoute('app_admin_formulaires_supplementaires');
    }
}
