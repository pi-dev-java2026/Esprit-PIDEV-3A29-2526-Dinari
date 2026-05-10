<?php

namespace App\Service;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LocalAudioService
{
    private string $projectDir;
    
    public function __construct(string $projectDir)
    {
        $this->projectDir = $projectDir;
    }
    
    /**
     * Transcrit un fichier audio en texte (Whisper)
     */
    public function transcribe(string $audioPath): string
    {
        // Commande Whisper
        $command = [
            'python', '-m', 'whisper',
            $audioPath,
            '--model', 'base',
            '--language', 'French',
            '--task', 'transcribe',
            '--output_format', 'txt',
            '--output_dir', sys_get_temp_dir()
        ];
        
        $process = new Process($command);
        $process->setTimeout(120);
        $process->run();
        
        if (!$process->isSuccessful()) {
            // En cas d'erreur, retourner un message par défaut
            return "Je n'ai pas pu comprendre votre message. Veuillez réessayer.";
        }
        
        // Lire le fichier de sortie
        $outputFile = sys_get_temp_dir() . '/' . pathinfo($audioPath, PATHINFO_FILENAME) . '.txt';
        
        /** @var string|false $transcript */
        $transcript = file_get_contents($outputFile);
        
        // Nettoyer
        if (file_exists($outputFile)) {
            unlink($outputFile);
        }
        
        // Convertir false en string vide
        if ($transcript === false) {
            return "Je n'ai pas pu lire le fichier audio. Veuillez réessayer.";
        }
        
        return trim((string) $transcript);
    }
    
    /**
     * Convertit du texte en audio (Piper TTS)
     */
    public function textToSpeech(string $text, string $outputPath): string
    {
        $voiceModel = $this->projectDir . '/piper_models/fr_FR-siwis-medium.onnx';
        
        // Vérifier que le fichier vocal existe
        if (!file_exists($voiceModel)) {
            // Si pas de voix, créer un fichier vide
            file_put_contents($outputPath, '');
            return $outputPath;
        }
        
        // Nettoyer le texte pour la commande shell
        $escapedText = addslashes($text);
        $escapedText = str_replace('"', '\\"', $escapedText);
        
        // Commande Piper
        $command = sprintf(
            'echo "%s" | python -m piper --model "%s" --output_file "%s"',
            $escapedText,
            $voiceModel,
            $outputPath
        );
        
        $process = Process::fromShellCommandline($command);
        $process->setTimeout(60);
        $process->run();
        
        if (!$process->isSuccessful()) {
            // En cas d'erreur, créer un fichier vide
            file_put_contents($outputPath, '');
        }
        
        return $outputPath;
    }
}