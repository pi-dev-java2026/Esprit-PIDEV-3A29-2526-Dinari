<?php

namespace App\Command;

use App\Entity\Avis;
use App\Entity\Abonnement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeedAvisCommand extends Command
{
    protected static $defaultName = 'app:seed-avis';
    protected static $defaultDescription = 'Crée des avis de test pour la démo';

    public function __construct(private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $avisData = [
            [
                'nom_client' => 'Sophie Martin',
                'email_client' => 'sophie@example.com',
                'commentaire' => 'Dinari m\'a vraiment simplifié la gestion de mes abonnements. Je peux enfin voir tous mes services au même endroit et les prix sont au meilleur niveau. À recommander !',
                'note' => 5,
                'couleur_avatar' => '#FF6B6B',
                'abonnement_id' => 107,
                'jours_back' => 15
            ],
            [
                'nom_client' => 'Marc Dupont',
                'email_client' => 'marc@example.com',
                'commentaire' => 'Excellent service ! J\'ai pu comparer tous les plans et choisir celui qui me convient. La plateforme est très intuitive.',
                'note' => 5,
                'couleur_avatar' => '#4ECDC4',
                'abonnement_id' => 92,
                'jours_back' => 10
            ],
            [
                'nom_client' => 'Laurent Blanc',
                'email_client' => 'laurent@example.com',
                'commentaire' => 'Très bon prix pour mes services préférés. L\'interface de Dinari est claire et les avis d\'autres utilisateurs m\'ont vraiment aidé à décider.',
                'note' => 4,
                'couleur_avatar' => '#45B7D1',
                'abonnement_id' => 81,
                'jours_back' => 7
            ],
            [
                'nom_client' => 'Claire Rousseau',
                'email_client' => 'claire@example.com',
                'commentaire' => 'Dinari m\'a aidé à trouver le meilleur prix pour mon pack Adobe. Vraiment utile et économique !',
                'note' => 5,
                'couleur_avatar' => '#FFA07A',
                'abonnement_id' => 97,
                'jours_back' => 5
            ],
            [
                'nom_client' => 'Thomas Leclerc',
                'email_client' => 'thomas@example.com',
                'commentaire' => 'Application intuitive avec une très bonne UX. Les recommandations sont pertinentes et m\'ont permis de découvrir des services intéressants.',
                'note' => 4,
                'couleur_avatar' => '#98D8C8',
                'abonnement_id' => 88,
                'jours_back' => 3
            ],
            [
                'nom_client' => 'Nathalie Petit',
                'email_client' => 'nathalie@example.com',
                'commentaire' => 'Dinari a changé ma vie ! Plus besoin de chercher les meilleurs prix sur chaque plateforme. Tout est centralisé et cela m\'économise beaucoup d\'argent chaque mois.',
                'note' => 5,
                'couleur_avatar' => '#F7DC6F',
                'abonnement_id' => 84,
                'jours_back' => 1
            ],
        ];

        foreach ($avisData as $data) {
            // Vérifier que l'avis n'existe pas déjà
            $existing = $this->em->getRepository(Avis::class)
                ->findOneBy(['email_client' => $data['email_client']]);

            if ($existing) {
                $output->writeln('<comment>⏭️  Avis de ' . $data['nom_client'] . ' existe déjà, passage...</comment>');
                continue;
            }

            // Récupérer l'abonnement
            $abo = $this->em->getRepository(Abonnement::class)->find($data['abonnement_id']);
            if (!$abo) {
                $output->writeln('<error>❌ Abonnement ' . $data['abonnement_id'] . ' introuvable</error>');
                continue;
            }

            $avis = new Avis();
            $avis->setNomClient($data['nom_client']);
            $avis->setEmailClient($data['email_client']);
            $avis->setCommentaire($data['commentaire']);
            $avis->setNote($data['note']);
            $avis->setCouleurAvatar($data['couleur_avatar']);
            $avis->setAbonnement($abo);
            $avis->setApprouve(true);

            $date = new \DateTime();
            $date->modify('-' . $data['jours_back'] . ' days');
            $avis->setDateCretion($date);

            $this->em->persist($avis);
            $output->writeln('<info>✅ Avis de ' . $data['nom_client'] . ' créé</info>');
        }

        $this->em->flush();
        $output->writeln('<fg=green>✨ Tous les avis de test ont été créés avec succès !</>');
        $output->writeln('<fg=cyan>Visitez http://localhost:8000/client/abonnement pour voir les avis</>');

        return Command::SUCCESS;
    }
}
