<?php

namespace App\Controller;

use App\Entity\AdhesionMDL;
use App\Entity\FormulaireInscription;
use App\Repository\AdhesionMDLRepository;
use App\Repository\FormulaireInscriptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/adhesion-mdl')]
final class AdhesionMDLController extends AbstractController
{
    #[Route('', name: 'app_adhesion_mdl', methods: ['GET'])]
    public function formulaire(
        EntityManagerInterface $entityManager,
        FormulaireInscriptionRepository $formulaireRepo
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Récupérer ou créer l'adhésion MDL en brouillon
        $adhesion = $entityManager->getRepository(AdhesionMDL::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'brouillon']);

        if (!$adhesion) {
            $adhesion = new AdhesionMDL();
            $adhesion->setUtilisateur($user);
            
            // Essayer de récupérer un formulaire d'inscription validé pour pré-remplir
            $formulaire = $formulaireRepo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'validé'
            ]);
            
            if ($formulaire) {
                $adhesion->setFormulaireInscription($formulaire);
            }
            
            $entityManager->persist($adhesion);
            $entityManager->flush();
        }

        // Préparer les données par défaut depuis l'utilisateur
        $defaultData = [];
        $defaultData['nom'] = $user->getNom() ?? '';
        $defaultData['prenom'] = $user->getPrenom() ?? '';
        $defaultData['email_etudiant'] = $user->getEmail() ?? '';
        $defaultData['date_naissance'] = $user->getDateNaissance() 
            ? $user->getDateNaissance()->format('Y-m-d') 
            : '';

        return $this->render('adhesion_mdl/formulaire.html.twig', [
            'adhesion' => $adhesion,
            'defaultData' => $defaultData,
        ]);
    }

    #[Route('/save', name: 'app_adhesion_mdl_save', methods: ['POST'])]
    public function save(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Récupérer l'adhésion en brouillon
        $adhesion = $entityManager->getRepository(AdhesionMDL::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'brouillon']);

        if (!$adhesion) {
            return new JsonResponse(['success' => false, 'error' => 'Adhésion non trouvée'], 404);
        }

        // Sauvegarder les données
        $adhesion->setNom($request->request->get('nom'));
        $adhesion->setPrenom($request->request->get('prenom'));
        $adhesion->setClasse($request->request->get('classe'));
        
        $dateNaissance = $request->request->get('date_naissance');
        if ($dateNaissance) {
            $adhesion->setDateNaissance(new \DateTime($dateNaissance));
        }
        
        $adhesion->setEmailEtudiant($request->request->get('email_etudiant'));
        $adhesion->setNomResponsable($request->request->get('nom_responsable'));
        $adhesion->setAdresseResponsable($request->request->get('adresse_responsable'));
        $adhesion->setTypePaiement($request->request->get('type_paiement'));
        $adhesion->setAutorisationDroitImage($request->request->has('autorisation_droit_image'));

        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    #[Route('/upload-photo', name: 'app_adhesion_mdl_upload_photo', methods: ['POST'])]
    public function uploadPhoto(
        Request $request,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $adhesion = $entityManager->getRepository(AdhesionMDL::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'brouillon']);

        if (!$adhesion) {
            return new JsonResponse(['success' => false, 'error' => 'Adhésion non trouvée'], 404);
        }

        $photoFile = $request->files->get('photo');
        
        if ($photoFile) {
            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();

            try {
                $photoFile->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads/photos',
                    $newFilename
                );
                
                $adhesion->setPhotoIndividuelle($newFilename);
                $entityManager->flush();
                
                return new JsonResponse(['success' => true, 'filename' => $newFilename]);
            } catch (FileException $e) {
                return new JsonResponse(['success' => false, 'error' => 'Erreur lors de l\'upload'], 500);
            }
        }

        return new JsonResponse(['success' => false, 'error' => 'Aucun fichier'], 400);
    }

    #[Route('/submit', name: 'app_adhesion_mdl_submit', methods: ['POST'])]
    public function submit(
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $adhesion = $entityManager->getRepository(AdhesionMDL::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'brouillon']);

        if (!$adhesion) {
            return new JsonResponse(['success' => false, 'error' => 'Adhésion non trouvée'], 404);
        }

        // Valider que tous les champs obligatoires sont remplis
        if (!$adhesion->getNom() || !$adhesion->getPrenom() || !$adhesion->getClasse() 
            || !$adhesion->getDateNaissance() || !$adhesion->getEmailEtudiant()
            || !$adhesion->getNomResponsable() || !$adhesion->getAdresseResponsable()
            || !$adhesion->getTypePaiement() || !$adhesion->getPhotoIndividuelle()) {
            return new JsonResponse(['success' => false, 'error' => 'Tous les champs obligatoires doivent être remplis'], 400);
        }

        // Changer le statut
        $adhesion->setStatut('soumis');
        $adhesion->setDateSoumission(new \DateTime());
        
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    // Routes d'admin (garder les anciennes)
    #[Route('/admin/list', name: 'app_adhesion_m_d_l_index', methods: ['GET'])]
    public function index(AdhesionMDLRepository $adhesionMDLRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        
        return $this->render('adhesion_mdl/index.html.twig', [
            'adhesion_m_d_ls' => $adhesionMDLRepository->findAll(),
        ]);
    }
}
