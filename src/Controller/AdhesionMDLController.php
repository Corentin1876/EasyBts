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

        // Vérifier si l'utilisateur a déjà un dossier soumis ou validé
        $dossierExistant = $entityManager->getRepository(AdhesionMDL::class)
            ->createQueryBuilder('a')
            ->where('a.utilisateur = :user')
            ->andWhere('a.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['soumis', 'validé'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        
        if ($dossierExistant) {
            if ($dossierExistant->getStatut() === 'validé') {
                $this->addFlash('success', 'Votre adhésion à la MDL a déjà été validée !');
            } else {
                $this->addFlash('info', 'Vous avez déjà un dossier d\'adhésion MDL en cours de traitement. Vous ne pouvez pas en créer un nouveau.');
            }
            return $this->redirectToRoute('app_mes_dossiers');
        }

        // Vérifier si l'utilisateur a un dossier à modifier
        $adhesionAModifier = $entityManager->getRepository(AdhesionMDL::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'à modifier']);
        
        if ($adhesionAModifier) {
            // Changer le statut en brouillon pour permettre la modification
            $adhesionAModifier->setStatut('brouillon');
            $entityManager->flush();
            
            $this->addFlash('warning', 'L\'administration a demandé des modifications sur votre dossier d\'adhésion MDL. Veuillez apporter les corrections nécessaires et resoumettre votre dossier.');
            $adhesion = $adhesionAModifier;
        } else {
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
        $adhesion->setTelephoneEtudiant($request->request->get('telephone_etudiant'));
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
                
                return new JsonResponse([
                    'success' => true, 
                    'filename' => $newFilename,
                    'path' => '/uploads/photos/' . $newFilename
                ]);
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

    #[Route('/{id}/voir', name: 'app_adhesion_mdl_voir', methods: ['GET'])]
    public function voirAdhesion(
        AdhesionMDL $adhesion
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // Vérifier que c'est bien l'adhésion de l'utilisateur ou que c'est un admin
        if ($adhesion->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à cette adhésion.');
        }
        
        // Afficher le PDF directement en ligne
        return $this->forward('App\Controller\AdhesionMDLController::downloadPdf', [
            'adhesion' => $adhesion,
            'inline' => true,
        ]);
    }

    #[Route('/{id}/pdf', name: 'app_adhesion_mdl_pdf', methods: ['GET'])]
    public function downloadPdf(
        AdhesionMDL $adhesion,
        EntityManagerInterface $entityManager,
        bool $inline = false
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // Vérifier que c'est bien l'adhésion de l'utilisateur ou que c'est un admin
        if ($adhesion->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à cette adhésion.');
        }
        
        // Vérifier que le template existe
        $templatePath = $this->getParameter('kernel.project_dir') . '/formulaire Adhésion MDL.odt';
        
        if (!file_exists($templatePath)) {
            $this->addFlash('error', 'Le template d\'adhésion MDL est introuvable.');
            return $this->redirectToRoute('app_mes_dossiers');
        }
        
        // Lire le contenu du template
        $zip = new \ZipArchive();
        $tempDir = sys_get_temp_dir();
        $tempOdtPath = $tempDir . '/adhesion_mdl_' . $adhesion->getId() . '.odt';
        
        try {
            // Copier le template
            copy($templatePath, $tempOdtPath);
            
            // Ouvrir le fichier ODT (qui est un ZIP)
            if ($zip->open($tempOdtPath) === TRUE) {
                // Lire le contenu XML
                $content = $zip->getFromName('content.xml');
                
                if ($content === false) {
                    throw new \Exception('Impossible de lire le contenu du template ODT');
                }
                
                // Préparer les remplacements
                $replacements = [
                    // Informations élève
                    'nom' => strtoupper($adhesion->getNom() ?? ''),
                    'prenom' => $adhesion->getPrenom() ?? '',
                    'classe' => $adhesion->getClasse() ?? '',
                    'date_naissance' => $adhesion->getDateNaissance() ? $adhesion->getDateNaissance()->format('d/m/Y') : '',
                    'email_etudiant' => $adhesion->getEmailEtudiant() ?? '',
                    'telephone_etudiant' => $adhesion->getTelephoneEtudiant() ?? '',
                    
                    // Informations responsable
                    'nom_responsable' => $adhesion->getNomResponsable() ?? '',
                    'adresse_responsable' => $adhesion->getAdresseResponsable() ?? '',
                    
                    // Paiement
                    'montant_adhesion' => $adhesion->getMontantAdhesion() ?? '',
                    'type_paiement' => $adhesion->getTypePaiement() ?? '',
                    'mode_reglement' => $adhesion->getModeReglement() ?? '',
                    
                    // Autorisation
                    'autorisation_droit_image' => $adhesion->isAutorisationDroitImage() ? 'Oui' : 'Non',
                    
                    // Dates et référence
                    'date_soumission' => $adhesion->getDateSoumission() ? $adhesion->getDateSoumission()->format('d/m/Y') : '',
                    'numero_adhesion' => $adhesion->getId() ?? '',
                    'statut' => $adhesion->getStatut() ?? '',
                ];
                
                // Nettoyer le contenu XML pour fusionner les balises fragmentées
                $content = preg_replace('/<text:span[^>]*>/i', '', $content);
                $content = str_replace('</text:span>', '', $content);
                
                // Remplacer dans le contenu XML
                foreach ($replacements as $key => $value) {
                    // Échapper les caractères XML
                    $safeValue = htmlspecialchars((string)$value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
                    
                    // Remplacer toutes les variantes possibles
                    $patterns = [
                        '${' . $key . '}',
                        '$' . $key,
                        '&lt;' . $key . '&gt;',
                    ];
                    
                    foreach ($patterns as $pattern) {
                        $content = str_replace($pattern, $safeValue, $content);
                    }
                }
                
                // Mettre à jour le fichier
                $zip->deleteName('content.xml');
                $zip->addFromString('content.xml', $content);
                $zip->close();
                
                // Convertir en PDF avec LibreOffice
                $tempPdfPath = $tempDir . '/adhesion_mdl_' . $adhesion->getId() . '.pdf';
                
                // Chercher LibreOffice dans plusieurs emplacements possibles
                $libreOfficePaths = [
                    'C:\\Program Files\\LibreOffice\\program\\soffice.exe',
                    'C:\\Program Files (x86)\\LibreOffice\\program\\soffice.exe',
                    '/usr/bin/soffice',
                    '/usr/local/bin/soffice',
                    '/Applications/LibreOffice.app/Contents/MacOS/soffice'
                ];
                
                $libreOfficePath = null;
                foreach ($libreOfficePaths as $path) {
                    if (file_exists($path)) {
                        $libreOfficePath = $path;
                        break;
                    }
                }
                
                if ($libreOfficePath) {
                    $command = sprintf(
                        '"%s" --headless --convert-to pdf --outdir "%s" "%s" 2>&1',
                        $libreOfficePath,
                        $tempDir,
                        $tempOdtPath
                    );
                    
                    exec($command, $output, $returnCode);
                    
                    if (file_exists($tempPdfPath)) {
                        $pdfContent = file_get_contents($tempPdfPath);
                        
                        // Nettoyer les fichiers temporaires
                        @unlink($tempOdtPath);
                        @unlink($tempPdfPath);
                        
                        // Retourner le PDF
                        $response = new Response($pdfContent);
                        $response->headers->set('Content-Type', 'application/pdf');
                        
                        // Si inline=true, afficher dans le navigateur, sinon télécharger
                        if ($inline) {
                            $response->headers->set('Content-Disposition', 'inline; filename="adhesion_mdl_' . $adhesion->getId() . '.pdf"');
                        } else {
                            $response->headers->set('Content-Disposition', 'attachment; filename="adhesion_mdl_' . $adhesion->getId() . '.pdf"');
                        }
                        
                        return $response;
                    }
                }
                
                // Si LibreOffice n'est pas disponible, retourner l'ODT
                $odtContent = file_get_contents($tempOdtPath);
                @unlink($tempOdtPath);
                
                $response = new Response($odtContent);
                $response->headers->set('Content-Type', 'application/vnd.oasis.opendocument.text');
                $response->headers->set('Content-Disposition', 'attachment; filename="adhesion_mdl_' . $adhesion->getId() . '.odt"');
                
                return $response;
                
            } else {
                throw new \Exception('Impossible d\'ouvrir le fichier template ODT');
            }
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la génération du document : ' . $e->getMessage());
            return $this->redirectToRoute('app_mes_dossiers');
        }
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
