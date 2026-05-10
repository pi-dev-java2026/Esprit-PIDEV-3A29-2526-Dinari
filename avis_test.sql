-- ════════════════════════════════════════════════════════════════════════
-- AVIS DE TEST — Dinari Testimonials
-- ════════════════════════════════════════════════════════════════════════
-- Pour ajouter manuellement des avis de clients:
-- mysql -u root < avis_test.sql

-- EXEMPLE 1: Avis pour Netflix
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Sophie Martin',
  'sophie@example.com',
  'Dinari m\'a vraiment simplifié la gestion de mes abonnements. Je peux enfin voir tous mes services au même endroit et les prix sont au meilleur niveau. À recommander !',
  5,
  DATE_SUB(NOW(), INTERVAL 15 DAY),
  1,
  '#FF6B6B',
  1,
  NULL
);

-- EXEMPLE 2: Avis pour Spotify
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Marc Dupont',
  'marc@example.com',
  'Excellent service ! J\'ai pu comparer tous les plans de Spotify et choisir celui qui me convient vraiment. La plateforme est très intuitive.',
  5,
  DATE_SUB(NOW(), INTERVAL 10 DAY),
  1,
  '#4ECDC4',
  3,
  NULL
);

-- EXEMPLE 3: Avis pour YouTube Premium
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Laurent Blanc',
  'laurent@example.com',
  'Très bon prix pour YouTube Premium. L\'interface de Dinari est claire et les avis d\'autres utilisateurs m\'ont vraiment aidé à décider.',
  4,
  DATE_SUB(NOW(), INTERVAL 7 DAY),
  1,
  '#45B7D1',
  5,
  NULL
);

-- EXEMPLE 4: Avis pour Adobe
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Claire Rousseau',
  'claire@example.com',
  'Dinari m\'a aidé à trouver le meilleur prix pour mon pack Adobe Creative Cloud. Vraiment utile et économique !',
  5,
  DATE_SUB(NOW(), INTERVAL 5 DAY),
  1,
  '#FFA07A',
  7,
  NULL
);

-- EXEMPLE 5: Avis pour Figma
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Thomas Leclerc',
  'thomas@example.com',
  'Application intuitive avec une très bonne UX. Les recommandations sont pertinentes et cela m\'a permis de découvrir des services que je ne connaissais pas.',
  4,
  DATE_SUB(NOW(), INTERVAL 3 DAY),
  1,
  '#98D8C8',
  9,
  NULL
);

-- EXEMPLE 6: Avis pour Disney+
INSERT INTO avis (nom_client, email_client, commentaire, note, date_cretion, approuve, couleur_avatar, abonnement_id, paiement_id)
VALUES (
  'Nathalie Petit',
  'nathalie@example.com',
  'Dinari a changé ma vie ! Plus besoin de chercher les meilleurs prix sur chaque plateforme. Tout est centralisé et cela me fait économiser beaucoup d\'argent chaque mois.',
  5,
  DATE_SUB(NOW(), INTERVAL 1 DAY),
  1,
  '#F7DC6F',
  11,
  NULL
);

-- ════════════════════════════════════════════════════════════════════════
-- NOTES:
-- 1. Remplacez les abonnement_id par les vrais IDs de votre base
-- 2. Les paiement_id sont NULL pour les tests (pas de paiement associé)
-- 3. Changez approuve = 1 → approuve = 0 pour les avis en modération
-- ════════════════════════════════════════════════════════════════════════
