<?php

namespace App\Controller;

use App\Entity\FicheUrgence;
use App\Repository\FicheUrgenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fiche-urgence')]
final class FicheUrgenceController extends AbstractController
{
    #[Route('', name: 'app_fiche_urgence', methods: ['GET'])]
    public function formulaire(
        EntityManagerInterface $entityManager
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Vérifier si l'utilisateur a déjà une fiche soumise ou validée
        $ficheExistante = $entityManager->getRepository(FicheUrgence::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['soumis', 'validé'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        
        if ($ficheExistante) {
            if ($ficheExistante->getStatut() === 'validé') {
                $this->addFlash('success', 'Votre fiche d\'urgence a déjà été validée !');
            } else {
                $this->addFlash('info', 'Vous avez déjà une fiche d\'urgence en cours de traitement.');
            }
            return $this->redirectToRoute('app_mes_dossiers');
        }

        // Vérifier si l'utilisateur a une fiche à modifier
        $ficheAModifier = $entityManager->getRepository(FicheUrgence::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'à modifier']);

        // Sinon, vérifier s'il a un brouillon
        $fiche = $ficheAModifier ?? $entityManager->getRepository(FicheUrgence::class)
            ->findOneBy(['utilisateur' => $user, 'statut' => 'brouillon']);

        // Si aucun brouillon, créer une nouvelle fiche
        if (!$fiche) {
            $fiche = new FicheUrgence();
            $fiche->setUtilisateur($user);
            $fiche->setNomEtudiant($user->getNom());
            $fiche->setPrenomEtudiant($user->getPrenom());
            $entityManager->persist($fiche);
            $entityManager->flush();
        }

        return $this->render('fiche_urgence/formulaire.html.twig', [
            'fiche' => $fiche,
        ]);
    }

    #[Route('/save', name: 'app_fiche_urgence_save', methods: ['POST'])]
    public function save(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $fiche = $entityManager->getRepository(FicheUrgence::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['brouillon', 'à modifier'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$fiche) {
            return new JsonResponse(['success' => false, 'error' => 'Fiche introuvable'], 404);
        }

        // Enregistrer tous les champs sans changer le statut
        $fiche->setNomEtudiant($request->request->get('nom_etudiant'));
        $fiche->setPrenomEtudiant($request->request->get('prenom_etudiant'));
        $fiche->setClasse($request->request->get('classe'));
        $fiche->setSexe($request->request->get('sexe'));
        
        $dateNaissance = $request->request->get('date_naissance');
        if ($dateNaissance) {
            $fiche->setDateNaissance(new \DateTime($dateNaissance));
        }
        
        $fiche->setNomRepresentant($request->request->get('nom_representant'));
        $fiche->setAdresseRepresentant($request->request->get('adresse_representant'));
        
        $fiche->setCentreSecuNom($request->request->get('centre_secu_nom'));
        $fiche->setCentreSecuAdresse($request->request->get('centre_secu_adresse'));
        $fiche->setAssuranceNom($request->request->get('assurance_nom'));
        $fiche->setAssuranceAdresse($request->request->get('assurance_adresse'));
        $fiche->setAssuranceNumero($request->request->get('assurance_numero'));
        
        $fiche->setPereTelDomicile($request->request->get('pere_tel_domicile'));
        $fiche->setPereTelTravail($request->request->get('pere_tel_travail'));
        $fiche->setPerePoste($request->request->get('pere_poste'));
        $fiche->setPereTelPerso($request->request->get('pere_tel_perso'));
        
        $fiche->setMereTelTravail($request->request->get('mere_tel_travail'));
        $fiche->setMerePoste($request->request->get('mere_poste'));
        $fiche->setMereTelPerso($request->request->get('mere_tel_perso'));
        
        $fiche->setNomContactUrgence($request->request->get('nom_contact_urgence'));
        $fiche->setTelContactUrgence($request->request->get('tel_contact_urgence'));
        
        $dateVaccin = $request->request->get('date_vaccin_antitetanique');
        if ($dateVaccin) {
            $fiche->setDateVaccinAntitetanique(new \DateTime($dateVaccin));
        }
        
        $fiche->setObservationEtudiant($request->request->get('observation_etudiant'));
        $fiche->setMedecinNom($request->request->get('medecin_nom'));
        $fiche->setMedecinAdresse($request->request->get('medecin_adresse'));
        $fiche->setMedecinNumero($request->request->get('medecin_numero'));

        // Ne pas changer le statut, juste sauvegarder
        $entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Sauvegarde réussie']);
    }

    #[Route('/soumettre', name: 'app_fiche_urgence_soumettre', methods: ['POST'])]
    public function soumettre(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $fiche = $entityManager->getRepository(FicheUrgence::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['brouillon', 'à modifier'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$fiche) {
            return new JsonResponse(['success' => false, 'error' => 'Fiche introuvable'], 404);
        }

        // Enregistrer tous les champs
        $fiche->setNomEtudiant($request->request->get('nom_etudiant'));
        $fiche->setPrenomEtudiant($request->request->get('prenom_etudiant'));
        $fiche->setClasse($request->request->get('classe'));
        $fiche->setSexe($request->request->get('sexe'));
        
        $dateNaissance = $request->request->get('date_naissance');
        if ($dateNaissance) {
            $fiche->setDateNaissance(new \DateTime($dateNaissance));
        }
        
        $fiche->setNomRepresentant($request->request->get('nom_representant'));
        $fiche->setAdresseRepresentant($request->request->get('adresse_representant'));
        
        $fiche->setCentreSecuNom($request->request->get('centre_secu_nom'));
        $fiche->setCentreSecuAdresse($request->request->get('centre_secu_adresse'));
        $fiche->setAssuranceNom($request->request->get('assurance_nom'));
        $fiche->setAssuranceAdresse($request->request->get('assurance_adresse'));
        $fiche->setAssuranceNumero($request->request->get('assurance_numero'));
        
        $fiche->setPereTelDomicile($request->request->get('pere_tel_domicile'));
        $fiche->setPereTelTravail($request->request->get('pere_tel_travail'));
        $fiche->setPerePoste($request->request->get('pere_poste'));
        $fiche->setPereTelPerso($request->request->get('pere_tel_perso'));
        
        $fiche->setMereTelTravail($request->request->get('mere_tel_travail'));
        $fiche->setMerePoste($request->request->get('mere_poste'));
        $fiche->setMereTelPerso($request->request->get('mere_tel_perso'));
        
        $fiche->setNomContactUrgence($request->request->get('nom_contact_urgence'));
        $fiche->setTelContactUrgence($request->request->get('tel_contact_urgence'));
        
        $dateVaccin = $request->request->get('date_vaccin_antitetanique');
        if ($dateVaccin) {
            try {
                $fiche->setDateVaccinAntitetanique(new \DateTime($dateVaccin));
            } catch (\Exception $e) {
                // Date invalide, on l'ignore
            }
        }
        
        $fiche->setObservationEtudiant($request->request->get('observation_etudiant'));
        $fiche->setMedecinNom($request->request->get('medecin_nom'));
        $fiche->setMedecinAdresse($request->request->get('medecin_adresse'));
        $fiche->setMedecinNumero($request->request->get('medecin_numero'));

        // Validation basique
        if (!$fiche->getNomEtudiant() || !$fiche->getPrenomEtudiant() || !$fiche->getClasse()) {
            return new JsonResponse(['success' => false, 'error' => 'Les champs nom, prénom et classe sont obligatoires'], 400);
        }

        // Changer le statut à soumis
        $fiche->setStatut('soumis');
        $fiche->setDateSoumission(new \DateTime());
        
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    #[Route('/{id}/voir', name: 'app_fiche_urgence_voir', methods: ['GET'])]
    public function voirFiche(
        FicheUrgence $fiche
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // Vérifier que c'est bien la fiche de l'utilisateur ou que c'est un admin
        if ($fiche->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à cette fiche.');
        }
        
        // Retourner le PDF pour affichage inline
        return $this->generatePdf($fiche, true);
    }

    #[Route('/{id}/pdf', name: 'app_fiche_urgence_pdf', methods: ['GET'])]
    public function downloadPdf(
        FicheUrgence $fiche
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // Vérifier que c'est bien la fiche de l'utilisateur ou que c'est un admin
        if ($fiche->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à cette fiche.');
        }
        
        // Retourner le PDF en téléchargement
        return $this->generatePdf($fiche, false);
    }

    private function generatePdf(FicheUrgence $fiche, bool $inline = false): Response
    {
        
        // Vérifier que le template existe
        $templatePath = $this->getParameter('kernel.project_dir') . '/Fiche d\'urgence.odt';
        
        if (!file_exists($templatePath)) {
            $this->addFlash('error', 'Le template de fiche d\'urgence est introuvable.');
            return $this->redirectToRoute('app_mes_dossiers');
        }
        
        // Lire le contenu du template
        $zip = new \ZipArchive();
        $tempDir = sys_get_temp_dir();
        $tempOdtPath = $tempDir . '/fiche_urgence_' . $fiche->getId() . '.odt';
        
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
                    'nom_etudiant' => strtoupper($fiche->getNomEtudiant() ?? ''),
                    'prenom_etudiant' => $fiche->getPrenomEtudiant() ?? '',
                    'classe' => $fiche->getClasse() ?? '',
                    'sexe' => $fiche->getSexe() ?? '',
                    'date_naissance' => $fiche->getDateNaissance() ? $fiche->getDateNaissance()->format('d/m/Y') : '',
                    'nom_representant' => $fiche->getNomRepresentant() ?? '',
                    'adresse_representant' => $fiche->getAdresseRepresentant() ?? '',
                    
                    // Sécurité sociale et assurance
                    'centre_secu_nom' => $fiche->getCentreSecuNom() ?? '',
                    'centre_secu_adresse' => $fiche->getCentreSecuAdresse() ?? '',
                    'assurance_nom' => $fiche->getAssuranceNom() ?? '',
                    'assurance_adresse' => $fiche->getAssuranceAdresse() ?? '',
                    'assurance_numero' => $fiche->getAssuranceNumero() ?? '',
                    
                    // Contacts père
                    'pere_tel_domicile' => $fiche->getPereTelDomicile() ?? '',
                    'pere_tel_travail' => $fiche->getPereTelTravail() ?? '',
                    'pere_poste' => $fiche->getPerePoste() ?? '',
                    'pere_tel_perso' => $fiche->getPereTelPerso() ?? '',
                    
                    // Contacts mère
                    'mere_tel_travail' => $fiche->getMereTelTravail() ?? '',
                    'mere_poste' => $fiche->getMerePoste() ?? '',
                    'mere_tel_perso' => $fiche->getMereTelPerso() ?? '',
                    
                    // Contact urgence
                    'nom_contact_urgence' => $fiche->getNomContactUrgence() ?? '',
                    'tel_contact_urgence' => $fiche->getTelContactUrgence() ?? '',
                    
                    // Informations médicales
                    'date_vaccin_antitetanique' => $fiche->getDateVaccinAntitetanique() ? $fiche->getDateVaccinAntitetanique()->format('d/m/Y') : '',
                    'observation_etudiant' => $fiche->getObservationEtudiant() ?? '',
                    'medecin_nom' => $fiche->getMedecinNom() ?? '',
                    'medecin_adresse' => $fiche->getMedecinAdresse() ?? '',
                    'medecin_numero' => $fiche->getMedecinNumero() ?? '',
                    
                    // Dates et référence
                    'date_soumission' => $fiche->getDateSoumission() ? $fiche->getDateSoumission()->format('d/m/Y') : '',
                    'numero_fiche' => $fiche->getId() ?? '',
                    'statut' => $fiche->getStatut() ?? '',
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
                $tempPdfPath = $tempDir . '/fiche_urgence_' . $fiche->getId() . '.pdf';
                
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
                        
                        if ($inline) {
                            $response->headers->set('Content-Disposition', 'inline; filename="fiche_urgence_' . $fiche->getId() . '.pdf"');
                        } else {
                            $response->headers->set('Content-Disposition', 'attachment; filename="fiche_urgence_' . $fiche->getId() . '.pdf"');
                        }
                        
                        return $response;
                    }
                }
                
                // Si LibreOffice n'est pas disponible, retourner l'ODT
                $odtContent = file_get_contents($tempOdtPath);
                @unlink($tempOdtPath);
                
                $response = new Response($odtContent);
                $response->headers->set('Content-Type', 'application/vnd.oasis.opendocument.text');
                $response->headers->set('Content-Disposition', 'attachment; filename="fiche_urgence_' . $fiche->getId() . '.odt"');
                
                return $response;
                
            } else {
                throw new \Exception('Impossible d\'ouvrir le fichier template ODT');
            }
            
        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la génération du document : ' . $e->getMessage());
            return $this->redirectToRoute('app_mes_dossiers');
        }
    }
}
