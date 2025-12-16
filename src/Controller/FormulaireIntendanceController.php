<?php

namespace App\Controller;

use App\Entity\FormulaireIntendance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formulaire-intendance')]
class FormulaireIntendanceController extends AbstractController
{
    #[Route('/formulaire', name: 'app_formulaire_intendance', methods: ['GET'])]
    public function formulaire(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Vérifier que l'utilisateur a au moins un dossier BTS validé
        $dossierValide = $entityManager->getRepository(\App\Entity\FormulaireInscription::class)
            ->createQueryBuilder('f')
            ->where('f.remplit_formulaire = :user')
            ->andWhere('f.statut = :statut')
            ->setParameter('user', $user)
            ->setParameter('statut', 'validé')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$dossierValide) {
            $this->addFlash('error', 'Vous devez d\'abord avoir un dossier d\'inscription BTS validé pour accéder au formulaire d\'intendance.');
            return $this->redirectToRoute('app_mes_dossiers');
        }

        $formulaire = $entityManager->getRepository(FormulaireIntendance::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['brouillon', 'à modifier'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$formulaire) {
            $formulaire = new FormulaireIntendance();
            $formulaire->setUtilisateur($user);
            $entityManager->persist($formulaire);
            $entityManager->flush();
        }

        return $this->render('formulaire_intendance/formulaire.html.twig', [
            'formulaire' => $formulaire,
        ]);
    }

    #[Route('/save', name: 'app_formulaire_intendance_save', methods: ['POST'])]
    public function save(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $formulaire = $entityManager->getRepository(FormulaireIntendance::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['brouillon', 'à modifier'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$formulaire) {
            return new JsonResponse(['success' => false, 'error' => 'Formulaire introuvable'], 404);
        }

        // Enregistrer tous les champs sans changer le statut
        $formulaire->setNomEtudiant($request->request->get('nom_etudiant'));
        $formulaire->setPrenomEtudiant($request->request->get('prenom_etudiant'));
        $formulaire->setClasse($request->request->get('classe'));
        
        $dateNaissance = $request->request->get('date_naissance');
        if ($dateNaissance) {
            $formulaire->setDateNaissance(new \DateTime($dateNaissance));
        }
        
        $formulaire->setNomRepresentant($request->request->get('nom_representant'));
        $formulaire->setPrenomRepresentant($request->request->get('prenom_representant'));
        $formulaire->setAdresseRepresentant($request->request->get('adresse_representant'));
        $formulaire->setCodePostalRepresentant($request->request->get('code_postal_representant'));
        $formulaire->setTelephoneRepresentant($request->request->get('telephone_representant'));
        $formulaire->setVilleRepresentant($request->request->get('ville_representant'));
        $formulaire->setMailRepresentant($request->request->get('mail_representant'));
        $formulaire->setNomEmployeur($request->request->get('nom_employeur'));
        $formulaire->setAdresseEmployeur($request->request->get('adresse_employeur'));
        $formulaire->setEtudiantRegime($request->request->get('etudiant_regime'));

        $entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Sauvegarde réussie']);
    }

    #[Route('/soumettre', name: 'app_formulaire_intendance_soumettre', methods: ['POST'])]
    public function soumettre(
        Request $request,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        $formulaire = $entityManager->getRepository(FormulaireIntendance::class)
            ->createQueryBuilder('f')
            ->where('f.utilisateur = :user')
            ->andWhere('f.statut IN (:statuts)')
            ->setParameter('user', $user)
            ->setParameter('statuts', ['brouillon', 'à modifier'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$formulaire) {
            return new JsonResponse(['success' => false, 'error' => 'Formulaire introuvable'], 404);
        }

        // Enregistrer tous les champs
        $formulaire->setNomEtudiant($request->request->get('nom_etudiant'));
        $formulaire->setPrenomEtudiant($request->request->get('prenom_etudiant'));
        $formulaire->setClasse($request->request->get('classe'));
        
        $dateNaissance = $request->request->get('date_naissance');
        if ($dateNaissance) {
            $formulaire->setDateNaissance(new \DateTime($dateNaissance));
        }
        
        $formulaire->setNomRepresentant($request->request->get('nom_representant'));
        $formulaire->setPrenomRepresentant($request->request->get('prenom_representant'));
        $formulaire->setAdresseRepresentant($request->request->get('adresse_representant'));
        $formulaire->setCodePostalRepresentant($request->request->get('code_postal_representant'));
        $formulaire->setTelephoneRepresentant($request->request->get('telephone_representant'));
        $formulaire->setVilleRepresentant($request->request->get('ville_representant'));
        $formulaire->setMailRepresentant($request->request->get('mail_representant'));
        $formulaire->setNomEmployeur($request->request->get('nom_employeur'));
        $formulaire->setAdresseEmployeur($request->request->get('adresse_employeur'));
        $formulaire->setEtudiantRegime($request->request->get('etudiant_regime'));

        // Changer le statut et la date de soumission
        $formulaire->setStatut('soumis');
        $formulaire->setDateSoumission(new \DateTime());

        $entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Formulaire soumis avec succès',
            'redirect' => $this->generateUrl('app_mes_dossiers')
        ]);
    }

    #[Route('/{id}/voir', name: 'app_formulaire_intendance_voir', methods: ['GET'])]
    public function voirFormulaire(
        FormulaireIntendance $formulaire
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        if ($formulaire->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à ce formulaire.');
        }
        
        return $this->generatePdf($formulaire, true);
    }

    #[Route('/{id}/pdf', name: 'app_formulaire_intendance_pdf', methods: ['GET'])]
    public function downloadPdf(
        FormulaireIntendance $formulaire
    ): Response {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        if ($formulaire->getUtilisateur() !== $user && !$this->isGranted('ROLE_ADMIN')) {
            throw $this->createAccessDeniedException('Vous ne pouvez pas accéder à ce formulaire.');
        }
        
        return $this->generatePdf($formulaire, false);
    }

    private function generatePdf(FormulaireIntendance $formulaire, bool $inline = false): Response
    {
        $templatePath = $this->getParameter('kernel.project_dir') . '/Fiche intendance BTS.odt';
        
        if (!file_exists($templatePath)) {
            $this->addFlash('error', 'Le template de formulaire d\'intendance est introuvable.');
            return $this->redirectToRoute('app_mes_dossiers');
        }
        
        $zip = new \ZipArchive();
        $tempDir = sys_get_temp_dir();
        $tempOdtPath = $tempDir . '/formulaire_intendance_' . $formulaire->getId() . '.odt';
        
        try {
            copy($templatePath, $tempOdtPath);
            
            if ($zip->open($tempOdtPath) === TRUE) {
                $content = $zip->getFromName('content.xml');
                
                if ($content === false) {
                    throw new \Exception('Impossible de lire le contenu du template ODT');
                }
                
                $replacements = [
                    'nom_etudiant' => strtoupper($formulaire->getNomEtudiant() ?? ''),
                    'prenom_etudiant' => $formulaire->getPrenomEtudiant() ?? '',
                    'classe' => $formulaire->getClasse() ?? '',
                    'date_naissance' => $formulaire->getDateNaissance() ? $formulaire->getDateNaissance()->format('d/m/Y') : '',
                    'nom_representant' => $formulaire->getNomRepresentant() ?? '',
                    'prenom_representant' => $formulaire->getPrenomRepresentant() ?? '',
                    'adresse_representant' => $formulaire->getAdresseRepresentant() ?? '',
                    'code_postal_representant' => $formulaire->getCodePostalRepresentant() ?? '',
                    'telephone_representant' => $formulaire->getTelephoneRepresentant() ?? '',
                    'ville_representant' => $formulaire->getVilleRepresentant() ?? '',
                    'mail_representant' => $formulaire->getMailRepresentant() ?? '',
                    'nom_employeur' => $formulaire->getNomEmployeur() ?? '',
                    'adresse_employeur' => $formulaire->getAdresseEmployeur() ?? '',
                    'etudiant_regime' => $formulaire->getEtudiantRegime() ?? '',
                    'etudiant.regime' => $formulaire->getEtudiantRegime() ?? '',
                ];
                
                // Nettoyer le contenu XML pour éviter les balises qui coupent les variables
                $content = preg_replace('/<text:span[^>]*>/i', '', $content);
                $content = str_replace('</text:span>', '', $content);
                $content = preg_replace('/<text:s[^>]*\/>/i', ' ', $content);
                
                foreach ($replacements as $key => $value) {
                    $safeValue = htmlspecialchars((string)$value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
                    // Chercher avec différentes syntaxes
                    $content = str_replace('${' . $key . '}', $safeValue, $content);
                    $content = str_replace('{{' . $key . '}}', $safeValue, $content);
                    $content = str_replace('{' . $key . '}', $safeValue, $content);
                    $content = str_replace('{{' . strtoupper($key) . '}}', $safeValue, $content);
                    $content = str_replace('${' . strtoupper($key) . '}', $safeValue, $content);
                }
                
                $zip->deleteName('content.xml');
                $zip->addFromString('content.xml', $content);
                $zip->close();
                
                $tempPdfPath = $tempDir . '/formulaire_intendance_' . $formulaire->getId() . '.pdf';
                
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
                        
                        @unlink($tempOdtPath);
                        @unlink($tempPdfPath);
                        
                        $response = new Response($pdfContent);
                        $response->headers->set('Content-Type', 'application/pdf');
                        
                        if ($inline) {
                            $response->headers->set('Content-Disposition', 'inline; filename="formulaire_intendance_' . $formulaire->getId() . '.pdf"');
                        } else {
                            $response->headers->set('Content-Disposition', 'attachment; filename="formulaire_intendance_' . $formulaire->getId() . '.pdf"');
                        }
                        
                        return $response;
                    }
                }
                
                $odtContent = file_get_contents($tempOdtPath);
                @unlink($tempOdtPath);
                
                $response = new Response($odtContent);
                $response->headers->set('Content-Type', 'application/vnd.oasis.opendocument.text');
                $response->headers->set('Content-Disposition', 'attachment; filename="formulaire_intendance_' . $formulaire->getId() . '.odt"');
                
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
