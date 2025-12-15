<?php

namespace App\Service;

use App\Entity\FormulaireInscription;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class PdfGenerationService
{
    private const LIBREOFFICE_PATHS = [
        'C:\\Program Files\\LibreOffice\\program\\soffice.exe',
        'C:\\Program Files (x86)\\LibreOffice\\program\\soffice.exe',
        '/usr/bin/soffice',
        '/usr/local/bin/soffice',
    ];

    /**
     * Trouve le chemin de LibreOffice
     */
    public function findLibreOfficePath(): ?string
    {
        foreach (self::LIBREOFFICE_PATHS as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        
        return null;
    }

    /**
     * Remplace une variable dans le contenu XML
     */
    public function replaceVariable(string $content, string $variable, ?string $value): string
    {
        $safeValue = htmlspecialchars($value ?? '', ENT_XML1, 'UTF-8');
        return str_replace('${' . $variable . '}', $safeValue, $content);
    }

    /**
     * Génère le nom de fichier PDF
     */
    public function generatePdfFilename(FormulaireInscription $formulaire): string
    {
        $user = $formulaire->getRemplitFormulaire();
        $nom = $user ? str_replace(' ', '_', $user->getNom()) : 'Utilisateur';
        $prenom = $user ? str_replace(' ', '_', $user->getPrenom()) : '';
        
        return sprintf('dossier_inscription_%s_%s.pdf', $nom, $prenom);
    }

    /**
     * Crée une réponse de téléchargement pour un fichier
     */
    public function createDownloadResponse(string $filePath, string $filename): BinaryFileResponse
    {
        $response = new BinaryFileResponse($filePath);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $filename
        );
        
        return $response;
    }

    /**
     * Convertit ODT en PDF avec LibreOffice
     */
    public function convertOdtToPdf(string $odtPath, string $outputDir): ?string
    {
        $libreOfficePath = $this->findLibreOfficePath();
        
        if (!$libreOfficePath) {
            return null;
        }
        
        $command = sprintf(
            '"%s" --headless --convert-to pdf --outdir "%s" "%s" 2>&1',
            $libreOfficePath,
            $outputDir,
            $odtPath
        );
        
        exec($command, $output, $returnCode);
        
        sleep(2); // Attendre que le fichier soit créé
        
        $pdfPath = str_replace('.odt', '.pdf', $odtPath);
        
        if ($returnCode === 0 && file_exists($pdfPath)) {
            return $pdfPath;
        }
        
        return null;
    }
}
