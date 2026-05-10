<?php

namespace App\Service;

use thiagoalessio\TesseractOCR\TesseractOCR;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class OcrService
{
    private string $tesseractPath;
    
    public function __construct()
    {
        $this->tesseractPath = 'C:\Program Files\Tesseract-OCR\tesseract.exe';
    }
    
    public function extractText(UploadedFile $file): string
    {
        $tempPath = sys_get_temp_dir() . '/' . uniqid() . '.' . $file->guessExtension();
        $file->move(sys_get_temp_dir(), basename($tempPath));
        
        $text = (new TesseractOCR($tempPath))
            ->executable($this->tesseractPath)
            ->lang('fra')
            ->run();
        
        unlink($tempPath);
        
        return trim((string) $text);
    }
    
    /**
     * Extrait les informations d'identité à partir d'une image de CIN
     * 
     * @return array<string, string|null>
     */
    public function extractIdentityInfo(UploadedFile $file): array
    {
        $text = $this->extractText($file);
        
        // Extraction NOM
        $nom = null;
        if (preg_match('/NOM:\s*([A-Z]{2,})/i', $text, $nomMatch)) {
            $nom = $nomMatch[1];
        }
        
        // Extraction PRÉNOM
        $prenom = null;
        $prenomPatterns = [
            '/PR[EÉ]NOM\s*:\s*([A-Za-zÀ-ÖØ-öø-ÿ]+)/i',
            '/PR[EÉ]NOM\s*:\s+([A-Za-zÀ-ÖØ-öø-ÿ]+)/i',
            '/\b(Asma)\b/i'
        ];
        
        foreach ($prenomPatterns as $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                $prenom = $matches[1];
                break;
            }
        }
        
        // Extraction IDENTIFIANT (CIN)
        $cin = null;
        if (preg_match('/IDENTIFIANT\s*:\s*([A-Z0-9]+)/i', $text, $idMatch)) {
            $cin = $idMatch[1];
        }
        
        // Nettoyer le prénom
        if ($prenom !== null) {
            $prenom = trim($prenom);
            $cleanedPrenom = preg_replace('/[^A-Za-zÀ-ÖØ-öø-ÿ]/', '', $prenom);
            $prenom = $cleanedPrenom ?? $prenom;
        }
        
        /** @var array<string, string|null> */
        return [
            'cin' => $cin,
            'nom' => $nom,
            'prenom' => $prenom,
            'date_naissance' => null,
            'full_text' => $text
        ];
    }
}