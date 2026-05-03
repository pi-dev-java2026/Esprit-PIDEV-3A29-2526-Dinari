<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

/**
 * Service qui appelle le modèle ML Python pour classer
 * un texte de réclamation dans un type prédéfini.
 *
 * Types possibles : Paiement, Technique, Compte, Service, Livraison
 */
class ReclamationClassifierService
{
    private string $scriptPath;

    public function __construct(
        private readonly LoggerInterface $logger,
        string $projectDir
    ) {
        $this->scriptPath = $projectDir . '/scripts/classify_reclamation.py';
    }

    /**
     * Classifie un texte de réclamation via le modèle ML Python.
     *
     * @param string $text Le texte à classifier (description du problème)
     * @return array{
     *   type: string,
     *   confidence: float,
     *   all_scores: array<string, float>,
     *   error: string|null
     * }
     */
    public function classify(string $text): array
    {
        $text = trim($text);

        if (empty($text)) {
            return $this->errorResult('Le texte ne peut pas être vide.');
        }

        // Sécuriser le texte pour l'argument shell
        $escapedText = escapeshellarg($text);

        // Déterminer l'exécutable Python disponible
        $python = $this->getPythonExecutable();

        if (!$python) {
            $this->logger->error('[ClassifierService] Python introuvable sur le système.');
            return $this->errorResult('Python n\'est pas installé ou n\'est pas accessible depuis le serveur.');
        }

        $scriptPath = escapeshellarg($this->scriptPath);
        $command    = "{$python} {$scriptPath} {$escapedText} 2>&1";

        $this->logger->info('[ClassifierService] Exécution du script ML', [
            'command' => $command,
            'text'    => $text,
        ]);

        $output   = [];
        $exitCode = 0;
        exec($command, $output, $exitCode);

        $raw = implode("\n", $output);
        $this->logger->info('[ClassifierService] Sortie Python brute', ['raw' => $raw, 'exitCode' => $exitCode]);

        if (empty($raw)) {
            return $this->errorResult('Le script ML n\'a produit aucune sortie.');
        }

        // Extraire la première ligne JSON valide (ignorer les warnings Python)
        $jsonLine = $this->extractJsonLine($raw);

        if (!$jsonLine) {
            $this->logger->error('[ClassifierService] Aucune ligne JSON valide trouvée', ['raw' => $raw]);
            return $this->errorResult('Réponse du script ML invalide.');
        }

        $data = json_decode($jsonLine, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->logger->error('[ClassifierService] Erreur JSON decode', ['raw' => $jsonLine]);
            return $this->errorResult('Impossible de décoder la réponse du modèle ML.');
        }

        if (isset($data['error']) && !empty($data['error'])) {
            return $this->errorResult($data['error']);
        }

        return [
            'type'       => $data['type']       ?? 'Inconnu',
            'confidence' => (float) ($data['confidence'] ?? 0.0),
            'all_scores' => $data['all_scores']  ?? [],
            'error'      => null,
        ];
    }

    /**
     * Retourne le chemin de l'exécutable Python disponible.
     * Essaie d'abord les chemins absolus connus (Windows), puis les commandes génériques.
     */
    private function getPythonExecutable(): ?string
    {
        $candidates = [
            // Chemins absolus Windows connus
            'C:\\Users\\azizz\\AppData\\Local\\Programs\\Python\\Python310\\python.exe',
            'C:\\Python311\\python.exe',
            'C:\\Python310\\python.exe',
            'C:\\Python39\\python.exe',
            // Commandes génériques (si Python est dans le PATH)
            'python',
            'python3',
            'python3.11',
            'python3.10',
            'python3.9',
        ];

        foreach ($candidates as $python) {
            $out  = [];
            $code = 0;
            exec(escapeshellarg($python) . ' --version 2>&1', $out, $code);
            if ($code === 0) {
                $this->logger->info('[ClassifierService] Python trouvé', ['path' => $python]);
                return $python;
            }
        }

        return null;
    }

    /**
     * Extrait la première ligne JSON valide depuis une sortie multi-lignes.
     */
    private function extractJsonLine(string $raw): ?string
    {
        foreach (explode("\n", $raw) as $line) {
            $line = trim($line);
            if (str_starts_with($line, '{') && str_ends_with($line, '}')) {
                return $line;
            }
        }
        return null;
    }

    /**
     * Retourne un tableau d'erreur structuré.
     */
    private function errorResult(string $message): array
    {
        return [
            'type'       => 'Inconnu',
            'confidence' => 0.0,
            'all_scores' => [],
            'error'      => $message,
        ];
    }
}
