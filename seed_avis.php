<?php
// This file allows you to test the app by seeding test testimonials
// Run: php seed_avis.php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/bootstrap.php';

use App\Entity\Avis;
use Doctrine\ORM\EntityManagerInterface;

/** @var \Symfony\Component\DependencyInjection\ContainerInterface $container */
$container = require __DIR__.'/config/bootstrap.php';
$em = $container->get('doctrine.orm.entity_manager');

$avisData = [
    [
        'nom_client' => 'Sophie Martin',
        'email_client' => 'sophie@example.com',
        'commentaire' => 'Dinari m\'a vraiment simplifié la gestion de mes abonnements. Je peux enfin voir tous mes services au même endroit et les prix sont au meilleur niveau. À recommander !',
        'note' => 5,
        'couleur_avatar' => '#FF6B6B',
        'abonnement_id' => 1,
        'jours_back' => 15
    ],
    [
        'nom_client' => 'Marc Dupont',
        'email_client' => 'marc@example.com',
        'commentaire' => 'Excellent service ! J\'ai pu comparer tous les plans et choisir celui qui me convient. La plateforme est très intuitive.',
        'note' => 5,
        'couleur_avatar' => '#4ECDC4',
        'abonnement_id' => 2,
        'jours_back' => 10
    ],
    [
        'nom_client' => 'Laurent Blanc',
        'email_client' => 'laurent@example.com',
        'commentaire' => 'Très bon prix pour mes services préférés. L\'interface de Dinari est claire et les avis d\'autres utilisateurs m\'ont vraiment aidé à décider.',
        'note' => 4,
        'couleur_avatar' => '#45B7D1',
        'abonnement_id' => 3,
        'jours_back' => 7
    ],
    [
        'nom_client' => 'Claire Rousseau',
        'email_client' => 'claire@example.com',
        'commentaire' => 'Dinari m\'a aidé à trouver le meilleur prix pour mon pack Adobe. Vraiment utile et économique !',
        'note' => 5,
        'couleur_avatar' => '#FFA07A',
        'abonnement_id' => 1,
        'jours_back' => 5
    ],
    [
        'nom_client' => 'Thomas Leclerc',
        'email_client' => 'thomas@example.com',
        'commentaire' => 'Application intuitive avec une très bonne UX. Les recommandations sont pertinentes et m\'ont permis de découvrir des services intéressants.',
        'note' => 4,
        'couleur_avatar' => '#98D8C8',
        'abonnement_id' => 2,
        'jours_back' => 3
    ],
    [
        'nom_client' => 'Nathalie Petit',
        'email_client' => 'nathalie@example.com',
        'commentaire' => 'Dinari a changé ma vie ! Plus besoin de chercher les meilleurs prix sur chaque plateforme. Tout est centralisé et cela m\'économise beaucoup d\'argent chaque mois.',
        'note' => 5,
        'couleur_avatar' => '#F7DC6F',
        'abonnement_id' => 3,
        'jours_back' => 1
    ],
];

try {
    foreach ($avisData as $data) {
        $avis = new Avis();
        $avis->setNomClient($data['nom_client']);
        $avis->setEmailClient($data['email_client']);
        $avis->setCommentaire($data['commentaire']);
        $avis->setNote($data['note']);
        $avis->setCouleurAvatar($data['couleur_avatar']);
        $avis->setApprouve(true); // Auto-approuver les avis de test

        // Récupérer l'abonnement
        $abo = $em->getRepository('App:Abonnement')->find($data['abonnement_id']);
        if ($abo) {
            $avis->setAbonnement($abo);
        }

        // Définir la date de création
        $date = new DateTime();
        $date->modify(-$data['jours_back'] . ' days');
        $avis->setDateCretion($date);

        $em->persist($avis);
    }

    $em->flush();
    echo "✅ " . count($avisData) . " avis de test ont été créés avec succès !\n";
    echo "Visitez http://localhost:8000/client/abonnement pour voir les avis\n";

} catch (Exception $e) {
    echo "❌ Erreur lors de la création des avis : " . $e->getMessage() . "\n";
    exit(1);
}
