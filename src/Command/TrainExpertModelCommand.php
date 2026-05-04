<?php

namespace App\Command;

use App\Repository\ExpertComptableRepository;
use App\Repository\OffreRepository;
use Phpml\Classification\NaiveBayes;
use Phpml\FeatureExtraction\TokenCountVectorizer;
use Phpml\FeatureExtraction\TfIdfTransformer;
use Phpml\ModelManager;
use Phpml\Pipeline;
use Phpml\Tokenization\WhitespaceTokenizer;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:train-expert-model',
    description: 'Entraine un modele ML pour predire la specialite a partir d un texte.'
)]
class TrainExpertModelCommand extends Command
{
    public function __construct(
        private ExpertComptableRepository $expertRepository,
        private OffreRepository $offreRepository
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $samples = [];
        $labels = [];

        $experts = $this->expertRepository->findAll();

        foreach ($experts as $expert) {
            $description = $this->normalizeText((string) $expert->getDescription());
            $specialite = trim((string) $expert->getSpecialite());

            if ($description !== '' && $specialite !== '') {
                $samples[] = $description;
                $labels[] = $specialite;
            }
        }

        $offres = $this->offreRepository->findAll();

        foreach ($offres as $offre) {
            $expert = $offre->getExpertComptable();

            if (!$expert) {
                continue;
            }

            $specialite = trim((string) $expert->getSpecialite());
            $titre = $this->normalizeText((string) $offre->getTitre());
            $description = $this->normalizeText((string) $offre->getDescription());

            $texte = trim($titre . ' ' . $description);

            if ($texte !== '' && $specialite !== '') {
                $samples[] = $texte;
                $labels[] = $specialite;
            }
        }

        if (count($samples) < 5) {
            $output->writeln('<error>Pas assez de donnees pour entrainer le modele.</error>');
            return Command::FAILURE;
        }

        $pipeline = new Pipeline(
            [
                new TokenCountVectorizer(new WhitespaceTokenizer()),
                new TfIdfTransformer(),
            ],
            new NaiveBayes()
        );

        $pipeline->train($samples, $labels);

        $modelDirectory = $this->getModelDirectory();

        if (!is_dir($modelDirectory)) {
            mkdir($modelDirectory, 0777, true);
        }

        $modelManager = new ModelManager();
        $modelManager->saveToFile(
            $pipeline,
            $modelDirectory . '/expert_speciality_pipeline.phpml'
        );

        $output->writeln('<info>Modele entraine avec succes.</info>');
        $output->writeln('<info>Nombre de samples : ' . count($samples) . '</info>');

        return Command::SUCCESS;
    }

    private function normalizeText(string $text): string
    {
        $text = mb_strtolower($text);

        $text = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $text) ?? '';
        $text = preg_replace('/\s+/', ' ', $text) ?? '';

        return trim($text);
    }

    private function getModelDirectory(): string
    {
        return dirname(__DIR__, 2) . '/var/ml';
    }
    
}