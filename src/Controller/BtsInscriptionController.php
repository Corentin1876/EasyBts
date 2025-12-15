<?php

namespace App\Controller;

use App\Entity\Specialisation;
use App\Entity\FormulaireInscription;
use App\Entity\InformationEleve;
use App\Entity\Responsable;
use App\Entity\ScolariteDes2AnneeAnterieur;
use App\Entity\Utilisateur;
use App\Repository\SpecialisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;

class BtsInscriptionController extends AbstractController
{
    #[Route('/bts', name: 'app_bts_liste')]
    #[IsGranted('ROLE_USER')]
    public function liste(
        EntityManagerInterface $entityManager,
        SpecialisationRepository $specialisationRepository
    ): Response {
        $user = $this->getUser();
        $brouillon = null;
        $dossierSoumis = null;
        $specialisation = null;
        
        // Chercher un brouillon existant pour cet utilisateur
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            
            // Chercher un dossier soumis ou validé
            $dossierSoumis = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => ['soumis', 'validé', 'rejeté'],
            ]);
            
            // Si pas de dossier soumis, chercher un brouillon ou un dossier à modifier
            if (!$dossierSoumis) {
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
                
                // Extraire la spécialisation du type_formulaire
                if ($brouillon && $brouillon->getTypeFormulaire()) {
                    $typeFormulaire = $brouillon->getTypeFormulaire();
                    // Format: "BTS - Nom de la spécialisation"
                    $nomSpecialisation = str_replace('BTS - ', '', $typeFormulaire);
                    $specialisation = $specialisationRepository->findOneBy(['nom' => $nomSpecialisation]);
                }
            }
        }

        return $this->render('bts/accueil.html.twig', [
            'brouillon' => $brouillon,
            'dossierSoumis' => $dossierSoumis,
            'specialisation' => $specialisation,
        ]);
    }

    #[Route('/bts/choix', name: 'app_bts_choix')]
    #[IsGranted('ROLE_USER')]
    public function choix(
        SpecialisationRepository $specialisationRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        $brouillon = null;
        
        // Vérifier s'il y a déjà un brouillon
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
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
        }

        $specialisations = $specialisationRepository->findAll();

        return $this->render('bts/choix.html.twig', [
            'specialisations' => $specialisations,
            'brouillon' => $brouillon,
        ]);
    }

    #[Route('/bts/inscription/reset', name: 'app_bts_inscription_reset')]
    #[IsGranted('ROLE_USER')]
    public function reset(
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        if ($user) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'statut' => 'brouillon',
            ]);
            
            if ($brouillon) {
                $entityManager->remove($brouillon);
                $entityManager->flush();
                $this->addFlash('success', 'Votre dossier d\'inscription a été supprimé.');
            } else {
                $this->addFlash('info', 'Aucun dossier en cours.');
            }
        }
        return $this->redirectToRoute('app_bts_liste');
    }

    #[Route('/bts/inscription/{id}', name: 'app_bts_inscription')]
    #[IsGranted('ROLE_USER')]
    public function inscription(
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        $savedData = '{}';
        
        if ($user instanceof \App\Entity\Utilisateur) {
            $repo = $entityManager->getRepository(FormulaireInscription::class);
            $brouillon = $repo->findOneBy([
                'remplit_formulaire' => $user,
                'type_formulaire' => 'BTS - ' . $specialisation->getNom(),
            ]);
            
            // Si le dossier existe et est déjà soumis, rediriger vers la page d'accueil
            if ($brouillon && in_array($brouillon->getStatut(), ['soumis', 'validé', 'rejeté'])) {
                $this->addFlash('info', 'Votre dossier a déjà été soumis et ne peut plus être modifié.');
                return $this->redirectToRoute('app_bts_liste');
            }
            
            // Préparer les données par défaut depuis l'utilisateur
            $defaultData = [
                'nom' => $user->getNom() ?? '',
                'prenom' => $user->getPrenom() ?? '',
                'email_eleve' => $user->getEmail() ?? '',
                'tel_eleve' => $user->getTelephone() ?? '',
                'date_naissance' => $user->getDateNaissance() ? $user->getDateNaissance()->format('Y-m-d') : '',
                'adresse_resp1' => $user->getAdresse() ?? '',
                'sexe' => $user->getUser() ?? '', // civilité
            ];
            
            if ($brouillon && $brouillon->getStatut() === 'brouillon') {
                // Fusionner les données du brouillon avec les données par défaut
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
                
                $savedData = json_encode([
                    'currentStep' => $brouillon->getDraftStep(),
                    'formData' => $mergedData
                ]);
            } else {
                // Première fois : utiliser les données de l'utilisateur
                $savedData = json_encode([
                    'currentStep' => 1,
                    'formData' => $defaultData
                ]);
            }
        }

        $response = $this->render('bts/formulaire_inscription.html.twig', [
            'specialisation' => $specialisation,
            'savedData' => $savedData,
        ]);
        
        // Empêcher le cache du navigateur pour que les données soient toujours fraîches
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        
        return $response;
    }

    #[Route('/bts/inscription/{id}/save', name: 'app_bts_inscription_save', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function saveProgress(
        Request $request,
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'error' => 'Non authentifié'], 401);
        }
        
        $data = json_decode($request->getContent(), true);
        if (!$data) {
            return $this->json(['success' => false, 'error' => 'Données invalides'], 400);
        }
        
        $type = 'BTS - ' . $specialisation->getNom();
        $repo = $entityManager->getRepository(FormulaireInscription::class);
        
        // Chercher un brouillon existant
        $formulaire = $repo->findOneBy([
            'remplit_formulaire' => $user,
            'type_formulaire' => $type,
        ]);
        
        // Empêcher la sauvegarde si le dossier est déjà soumis
        if ($formulaire && in_array($formulaire->getStatut(), ['soumis', 'validé', 'rejeté'])) {
            return $this->json(['success' => false, 'error' => 'Le dossier ne peut plus être modifié'], 403);
        }
        
        if (!$formulaire) {
            // Créer un nouveau brouillon
            $formulaire = new FormulaireInscription();
            $formulaire->setRemplitFormulaire($user);
            $formulaire->setTypeFormulaire($type);
            $formulaire->setStatut('brouillon');
            $formulaire->setEstSigne(false);
            $formulaire->setDateSoumission(new \DateTime()); // Requis par l'entité
            $entityManager->persist($formulaire);
        }
        
        // Mise à jour des données de brouillon
        $formulaire->setDraftJson(json_encode($data['formData'] ?? []));
        $formulaire->setDraftStep(isset($data['currentStep']) ? (int)$data['currentStep'] : 1);
        $formulaire->setDraftUpdatedAt(new \DateTime());
        
        // Si le formulaire existe mais n'est pas un brouillon, ne pas modifier
        if ($formulaire->getStatut() !== 'brouillon') {
            return $this->json(['success' => false, 'error' => 'Le dossier ne peut plus être modifié'], 403);
        }
        
        try {
            $entityManager->flush();
            return $this->json([
                'success' => true, 
                'draftId' => $formulaire->getId(),
                'step' => $formulaire->getDraftStep(),
                'message' => 'Sauvegarde réussie en base de données'
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false, 
                'error' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/bts/inscription/{id}/upload-document', name: 'app_bts_inscription_upload_document', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function uploadDocument(
        Request $request,
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'error' => 'Non authentifié'], 401);
        }

        $type = 'BTS - ' . $specialisation->getNom();
        $repo = $entityManager->getRepository(FormulaireInscription::class);
        
        // Récupérer le formulaire
        $formulaire = $repo->findOneBy([
            'remplit_formulaire' => $user,
            'type_formulaire' => $type,
        ]);

        if (!$formulaire) {
            return $this->json(['success' => false, 'error' => 'Aucun dossier trouvé'], 404);
        }

        $documentType = $request->request->get('document_type');
        $file = $request->files->get('file');

        if (!$file || !$documentType) {
            return $this->json(['success' => false, 'error' => 'Fichier ou type manquant'], 400);
        }

        // Vérifier l'extension
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
        $extension = strtolower($file->getClientOriginalExtension());
        
        if (!in_array($extension, $allowedExtensions)) {
            return $this->json(['success' => false, 'error' => 'Format de fichier non autorisé'], 400);
        }

        // Vérifier la taille (5Mo max, sauf relevés de notes 10Mo)
        $maxSize = $documentType === 'releves_notes' ? 10 * 1024 * 1024 : 5 * 1024 * 1024;
        if ($file->getSize() > $maxSize) {
            $maxSizeMo = $maxSize / (1024 * 1024);
            return $this->json(['success' => false, 'error' => "Fichier trop volumineux (max {$maxSizeMo}Mo)"], 400);
        }

        try {
            // Créer un nom de fichier unique
            $fileName = $user->getId() . '_' . $documentType . '_' . uniqid() . '.' . $extension;
            
            // Déplacer le fichier
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/documents';
            $file->move($uploadDir, $fileName);

            // Enregistrer le chemin dans la base de données
            $relativePath = '/uploads/documents/' . $fileName;
            
            switch ($documentType) {
                case 'carte_identite_recto':
                    $formulaire->setCarteIdentiteRecto($relativePath);
                    break;
                case 'carte_identite_verso':
                    $formulaire->setCarteIdentiteVerso($relativePath);
                    break;
                case 'justificatif_domicile':
                    $formulaire->setJustificatifDomicile($relativePath);
                    break;
                case 'releves_notes':
                    $formulaire->setRelevesNotes($relativePath);
                    break;
                default:
                    return $this->json(['success' => false, 'error' => 'Type de document inconnu'], 400);
            }

            $entityManager->flush();

            return $this->json([
                'success' => true,
                'filename' => $fileName,
                'path' => $relativePath
            ]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => 'Erreur upload: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/bts/inscription/{id}/submit', name: 'app_bts_inscription_submit', methods: ['POST'])]
    #[IsGranted('ROLE_USER')]
    public function submit(
        Request $request,
        Specialisation $specialisation,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        
        // Récupérer les données JSON du formulaire
        $content = $request->getContent();
        $data = json_decode($content, true);
        
        if (!$data || !isset($data['formData'])) {
            $this->addFlash('error', 'Données du formulaire invalides');
            return $this->redirectToRoute('app_bts_inscription', ['id' => $specialisation->getId()]);
        }
        
        $type = 'BTS - ' . $specialisation->getNom();
        $repo = $entityManager->getRepository(FormulaireInscription::class);
        
        // Chercher le brouillon existant
        $formulaire = $repo->findOneBy([
            'remplit_formulaire' => $user,
            'type_formulaire' => $type,
        ]);
        
        if (!$formulaire) {
            // Créer un nouveau formulaire si aucun brouillon n'existe
            $formulaire = new FormulaireInscription();
            $formulaire->setRemplitFormulaire($user);
            $formulaire->setTypeFormulaire($type);
            $formulaire->setDateSoumission(new \DateTime());
            $entityManager->persist($formulaire);
        }
        
        // Mettre à jour le formulaire avec les données finales
        $formulaire->setDraftJson(json_encode($data['formData']));
        $formulaire->setStatut('soumis'); // Statut = soumis pour validation admin
        $formulaire->setEstSigne(true);
        $formulaire->setDateSoumission(new \DateTime());
        $formulaire->setDraftUpdatedAt(new \DateTime());
        
        try {
            $entityManager->flush();
            $this->addFlash('success', 'Votre dossier a été soumis avec succès ! Il est en cours de vérification par nos équipes.');
            return $this->json(['success' => true, 'redirect' => $this->generateUrl('app_bts_liste')]);
        } catch (\Exception $e) {
            return $this->json(['success' => false, 'error' => 'Erreur lors de la soumission: ' . $e->getMessage()], 500);
        }
    }

    #[Route('/bts/dossier/{id}', name: 'app_bts_dossier_view')]
    #[IsGranted('ROLE_USER')]
    public function viewDossier(
        FormulaireInscription $formulaire,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        
        // Vérifier que c'est bien le dossier de l'utilisateur
        if ($formulaire->getRemplitFormulaire() !== $user) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à ce dossier.');
        }
        
        // Si c'est un brouillon, rediriger vers le formulaire d'édition
        if ($formulaire->getStatut() === 'brouillon') {
            // Récupérer la spécialisation associée
            $specialisation = $formulaire->getTypeFormulaire();
            $specialisationEntity = $entityManager->getRepository(Specialisation::class)
                ->findOneBy(['nom' => str_replace('BTS - ', '', $specialisation)]);
            
            if ($specialisationEntity) {
                return $this->redirectToRoute('app_bts_inscription', ['id' => $specialisationEntity->getId()]);
            }
        }
        
        // Pour les dossiers validés/soumis, afficher le PDF directement
        return $this->forward('App\Controller\BtsInscriptionController::downloadPdf', [
            'formulaire' => $formulaire,
            'inline' => true,
        ]);
    }

    #[Route('/bts/inscription/{id}/pdf', name: 'app_bts_inscription_pdf')]
    #[IsGranted('ROLE_USER')]
    public function downloadPdf(
        FormulaireInscription $formulaire,
        EntityManagerInterface $entityManager,
        bool $inline = false
    ): Response {
        $user = $this->getUser();
        
        // Vérifier que c'est bien le dossier de l'utilisateur
        if ($formulaire->getRemplitFormulaire() !== $user) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à ce dossier.');
        }
        
        // Vérifier que le dossier est validé (sauf si appelé en inline depuis viewDossier)
        if (!$inline && $formulaire->getStatut() !== 'validé') {
            $this->addFlash('error', 'Seuls les dossiers validés peuvent être téléchargés en PDF.');
            return $this->redirectToRoute('app_bts_liste');
        }
        
        // Récupérer les données du formulaire
        $data = json_decode($formulaire->getDraftJson(), true) ?? [];
        
        // Vérifier que le template existe
        $templatePath = $this->getParameter('kernel.project_dir') . '/dossier_inscription_bts.odt';
        
        if (!file_exists($templatePath)) {
            $this->addFlash('error', 'Le template de dossier d\'inscription est introuvable.');
            return $this->redirectToRoute('app_bts_liste');
        }
        
        // Lire le contenu du template
        $zip = new \ZipArchive();
        $tempDir = sys_get_temp_dir();
        $tempOdtPath = $tempDir . '/dossier_' . $formulaire->getId() . '.odt';
        
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
                
                // Remplacer toutes les variables
                $replacements = [
                    // Identité élève
                    'nom' => strtoupper($data['nom'] ?? $user->getNom() ?? ''),
                    'prenom' => $data['prenom'] ?? $user->getPrenom() ?? '',
                    'sexe' => $data['sexe'] ?? '',
                    'date_naissance' => $data['date_naissance'] ?? '',
                    'nationalite' => $data['nationalite'] ?? '',
                    'numero_secu' => $data['numero_secu'] ?? '',
                    'dep_naissance' => $data['dep_naissance'] ?? '',
                    'commune_naissance' => $data['commune_naissance'] ?? '',
                    
                    // Téléphone et email élève (formats compatibles avec ancien template)
                    'tel_eleve' => $data['tel_eleve'] ?? '',
                    'tel_mobile' => $data['tel_eleve'] ?? '',
                    'tel_fixe' => '',
                    'email_eleve' => $data['email_eleve'] ?? $user->getEmail() ?? '',
                    'email' => $data['email_eleve'] ?? $user->getEmail() ?? '',
                    
                    // Adresse élève (non capturée dans le formulaire actuel)
                    'adresse' => '',
                    'commune' => '',
                    
                    'sms_eleve' => ($data['sms_eleve'] ?? '') == '1' ? 'Oui' : 'Non',
                    
                    // Scolarité année en cours
                    'specialite' => $data['specialite'] ?? '',
                    'redoublement' => ($data['redoublement'] ?? '') == '1' ? 'Oui' : 'Non',
                    'niveau_classe' => $data['niveau_classe'] ?? '',
                    'regime_scolaire' => $data['regime_scolaire'] ?? '',
                    'lv1' => $data['lv1'] ?? '',
                    'lv2' => $data['lv2'] ?? '',
                    
                    // Transport
                    'transport' => ($data['transport'] ?? '') == '1' ? 'Oui' : 'Non',
                    'type_transport' => $data['type_transport'] ?? '',
                    'immatriculation' => $data['immatriculation'] ?? '',
                    
                    // Année N-1
                    'annee_n1' => $data['annee_n1'] ?? '',
                    'classe_n1' => $data['classe_n1'] ?? '',
                    'lv1_n1' => $data['lv1_n1'] ?? '',
                    'lv2_n1' => $data['lv2_n1'] ?? '',
                    'etablissement_n1' => $data['etablissement_n1'] ?? '',
                    'etablisment_n1' => $data['etablissement_n1'] ?? '', // Support typo in template
                    'option_n1' => $data['option_n1'] ?? '',
                    
                    // Année N-2
                    'annee_n2' => $data['annee_n2'] ?? '',
                    'classe_n2' => $data['classe_n2'] ?? '',
                    'lv1_n2' => $data['lv1_n2'] ?? '',
                    'lv2_n2' => $data['lv2_n2'] ?? '',
                    'etablissement_n2' => $data['etablissement_n2'] ?? '',
                    'etablisment_n2' => $data['etablissement_n2'] ?? '', // Support typo in template
                    'option_n2' => $data['option_n2'] ?? '',
                    
                    // Diplôme
                    'dernier_diplome' => $data['dernier_diplome'] ?? '',
                    
                    // Responsable légal 1
                    'lien_resp1' => $data['lien_resp1'] ?? '',
                    'nom_resp1' => $data['nom_resp1'] ?? '',
                    'prenom_resp1' => $data['prenom_resp1'] ?? '',
                    'adresse_resp1' => $data['adresse_resp1'] ?? '',
                    'commune_resp1' => $data['commune_resp1'] ?? '',
                    'tel_mobile_resp1' => $data['tel_mobile_resp1'] ?? '',
                    'tel_travail_resp1' => $data['tel_travail_resp1'] ?? '',
                    'tel_domicile_resp1' => $data['tel_domicile_resp1'] ?? '',
                    'email_resp1' => $data['email_resp1'] ?? '',
                    'profession_resp1' => $data['profession_resp1'] ?? '',
                    'sms_resp1' => ($data['sms_resp1'] ?? '') == '1' ? 'Oui' : 'Non',
                    'comm_asso_resp1' => ($data['comm_asso_resp1'] ?? '') == '1' ? 'Oui' : 'Non',
                    
                    // Responsable légal 2
                    'lien_resp2' => $data['lien_resp2'] ?? '',
                    'nom_resp2' => $data['nom_resp2'] ?? '',
                    'prenom_resp2' => $data['prenom_resp2'] ?? '',
                    'adresse_resp2' => $data['adresse_resp2'] ?? '',
                    'commune_resp2' => $data['commune_resp2'] ?? '',
                    'tel_mobile_resp2' => $data['tel_mobile_resp2'] ?? '',
                    'tel_travail_resp2' => $data['tel_travail_resp2'] ?? '',
                    'tel_domicile_resp2' => $data['tel_domicile_resp2'] ?? '',
                    'email_resp2' => $data['email_resp2'] ?? '',
                    'profession_resp2' => $data['profession_resp2'] ?? '',
                    'sms_resp2' => ($data['sms_resp2'] ?? '') == '1' ? 'Oui' : 'Non',
                    'comm_asso_resp2' => ($data['comm_asso_resp2'] ?? '') == '1' ? 'Oui' : 'Non',
                    
                    // Informations administratives
                    'date_soumission' => $formulaire->getDateSoumission()?->format('d/m/Y') ?? '',
                    'numero_dossier' => $formulaire->getId() ?? '',
                ];
                
                // Nettoyer le contenu XML pour fusionner les balises fragmentées
                // Dans LibreOffice, ${variable} peut être séparé en plusieurs balises <text:span>
                $content = preg_replace('/<text:span[^>]*>/i', '', $content);
                $content = str_replace('</text:span>', '', $content);
                
                // DEBUG: Sauvegarder le contenu avant remplacement
                if ($_ENV['APP_ENV'] === 'dev') {
                    file_put_contents($tempDir . '/content_before.xml', $content);
                }
                
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
                
                // DEBUG: Sauvegarder le contenu après remplacement
                if ($_ENV['APP_ENV'] === 'dev') {
                    file_put_contents($tempDir . '/content_after.xml', $content);
                    file_put_contents($tempDir . '/replacements.json', json_encode($replacements, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
                
                // Mettre à jour le fichier
                $zip->deleteName('content.xml');
                $zip->addFromString('content.xml', $content);
                $zip->close();
                
                // Convertir en PDF avec LibreOffice
                $tempPdfPath = $tempDir . '/dossier_' . $formulaire->getId() . '.pdf';
                
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
                    
                    // Attendre que le fichier soit créé (LibreOffice peut être lent)
                    $maxWait = 10; // 10 secondes max
                    $waited = 0;
                    while (!file_exists($tempPdfPath) && $waited < $maxWait) {
                        sleep(1);
                        $waited++;
                    }
                    
                    if (file_exists($tempPdfPath)) {
                        $filename = sprintf(
                            'Dossier_Inscription_%s_%s_%s.pdf',
                            $user->getNom(),
                            $user->getPrenom(),
                            date('Y-m-d')
                        );
                        
                        $response = new Response(file_get_contents($tempPdfPath));
                        $response->headers->set('Content-Type', 'application/pdf');
                        
                        // Si inline=true, afficher dans le navigateur, sinon télécharger
                        if ($inline) {
                            $response->headers->set('Content-Disposition', sprintf('inline; filename="%s"', $filename));
                        } else {
                            $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $filename));
                        }
                        
                        unlink($tempOdtPath);
                        unlink($tempPdfPath);
                        
                        return $response;
                    } else {
                        // Si la conversion PDF échoue, logger l'erreur
                        error_log("Échec conversion PDF - ReturnCode: $returnCode - Output: " . implode("\n", $output));
                        $this->addFlash('warning', 'La conversion en PDF a échoué. Le document ODT sera téléchargé à la place.');
                    }
                } else {
                    $this->addFlash('warning', 'LibreOffice n\'est pas installé. Le document ODT sera téléchargé.');
                }
                
                // Fallback: renvoyer le ODT
                $filename = sprintf(
                    'Dossier_Inscription_%s_%s_%s.odt',
                    $user->getNom(),
                    $user->getPrenom(),
                    date('Y-m-d')
                );
                
                $response = new Response(file_get_contents($tempOdtPath));
                $response->headers->set('Content-Type', 'application/vnd.oasis.opendocument.text');
                $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $filename));
                
                unlink($tempOdtPath);
                
                return $response;
            } else {
                throw new \Exception('Impossible d\'ouvrir le fichier ODT');
            }
        } catch (\Exception $e) {
            if (file_exists($tempOdtPath)) {
                unlink($tempOdtPath);
            }
            throw new \Exception('Erreur lors de la génération du document: ' . $e->getMessage());
        }
    }
}
