-- Seed courses matching the hardcoded client-side cards
INSERT INTO cours (nom_cours, contenu, description, date_creation) VALUES
('Les bases du budget',        'les-bases-du-budget',        'Créez et gérez un budget personnel efficace dès le premier mois. Apprenez à catégoriser vos dépenses, fixer des limites et suivre vos finances au quotidien.', '2026-01-01'),
('Épargne & investissement',   'epargne-investissement',     'Stratégies pour épargner intelligemment et faire fructifier votre argent. Découvrez les placements adaptés à chaque profil et objectif financier.', '2026-01-15'),
('Comprendre la banque',       'comprendre-la-banque',       'Taux d''intérêt, crédits, cartes bancaires — tout ce que vous devez savoir pour maîtriser vos relations avec votre banque et éviter les pièges.', '2026-02-01');

-- Seed quizzes linked to each course
INSERT INTO quiz (titre, liste_reponse, reponse_correct, score_quiz, date_creation, is_exam_mode, time_limit, id_cours) VALUES
('Quiz — Les bases du budget',
 'Qu''est-ce qu''un budget ?|Un plan de dépenses|Un compte bancaire|Une carte de crédit|Un prêt immobilier',
 'Un plan de dépenses', 10, '2026-01-10', 0, 15,
 (SELECT id_cours FROM cours WHERE contenu = 'les-bases-du-budget' LIMIT 1)),

('Quiz — Épargne & investissement',
 'Quel placement est le moins risqué ?|Livret d''épargne|Actions en bourse|Cryptomonnaies|Startups non cotées',
 'Livret d''épargne', 10, '2026-01-20', 0, 15,
 (SELECT id_cours FROM cours WHERE contenu = 'epargne-investissement' LIMIT 1)),

('Quiz — Comprendre la banque',
 'Que signifie le taux d''intérêt ?|Le coût de l''argent emprunté|Les frais de tenue de compte|Le plafond de retrait|La durée du crédit',
 'Le coût de l''argent emprunté', 10, '2026-02-05', 0, 15,
 (SELECT id_cours FROM cours WHERE contenu = 'comprendre-la-banque' LIMIT 1));
