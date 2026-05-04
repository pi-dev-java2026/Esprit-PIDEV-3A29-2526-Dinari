<?php

namespace App\Service;

use Phpml\ModelManager;
use Phpml\Pipeline;

class ExpertSpecialityPredictor
{
    private ?Pipeline $pipeline = null;

    public function predict(string $text): ?string
    {
        $text = $this->normalizeText($text);

        if ($text === '') {
            return null;
        }

        $pipeline = $this->getPipeline();

        if (!$pipeline) {
            return null;
        }

        $predictions = $pipeline->predict([$text]);

        return $predictions[0] ?? null;
    }

    private function getPipeline(): ?Pipeline
    {
        if ($this->pipeline !== null) {
            return $this->pipeline;
        }

        $modelPath = dirname(__DIR__, 2) . '/var/ml/expert_speciality_pipeline.phpml';

        if (!file_exists($modelPath)) {
            return null;
        }

        $modelManager = new ModelManager();
        $pipeline = $modelManager->restoreFromFile($modelPath);

        if (!$pipeline instanceof Pipeline) {
            return null;
        }

        $this->pipeline = $pipeline;

        return $this->pipeline;
    }

    private function normalizeText(string $text): string
    {
        $text = mb_strtolower($text);


        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text) ?? '';
        $text = preg_replace('/\s+/', ' ', $text) ?? '';

        return trim($text);
    }
}