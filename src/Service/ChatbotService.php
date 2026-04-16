<?php

namespace App\Service;

use App\Repository\CoursRepository;
use App\Repository\ChapitreRepository;
use App\Repository\QuizRepository;

/**
 * Domain-specific chatbot for the Dinari fintech learning platform.
 * Answers questions about courses, chapters, quizzes, and basic financial concepts.
 * Does NOT use any external AI API — all answers come from the platform knowledge base.
 */
class ChatbotService
{
    public function __construct(
        private readonly CoursRepository    $coursRepo,
        private readonly ChapitreRepository $chapitreRepo,
        private readonly QuizRepository     $quizRepo,
    ) {}

    /**
     * Main entry point: returns a response string for the given user message.
     */
    public function respond(string $message): string
    {
        $msg = mb_strtolower(trim($message));

        if ($msg === '') {
            return "Bonjour ! Je suis l'assistant Dinari. Posez-moi une question sur nos cours, chapitres, quiz ou concepts financiers.";
        }

        // Greeting
        if ($this->matches($msg, ['bonjour', 'salut', 'hello', 'hi', 'bonsoir', 'hey'])) {
            return "Bonjour ! 👋 Je suis l'assistant Dinari. Comment puis-je vous aider aujourd'hui ? Vous pouvez me poser des questions sur nos cours fintech, les chapitres, les quiz ou des concepts financiers de base.";
        }

        // What can you do?
        if ($this->matches($msg, ['que peux-tu faire', 'aide', 'help', 'comment tu fonctionnes', 'à quoi tu sers', 'quoi faire'])) {
            return "Je peux vous aider avec :\n• 📚 Nos cours fintech disponibles\n• 📖 Le contenu des chapitres\n• 🧠 Les quiz et leur fonctionnement\n• 💰 Les concepts financiers (budget, épargne, investissement)\n• 🎯 Votre progression d'apprentissage\n\nPosez-moi une question !";
        }

        // Course listing
        if ($this->matches($msg, ['cours', 'liste des cours', 'quels cours', 'formations', 'modules'])) {
            return $this->handleCourseList($msg);
        }

        // Chapter questions
        if ($this->matches($msg, ['chapitre', 'chapitres', 'leçon', 'leçons', 'contenu du cours'])) {
            return $this->handleChapterQuestion($msg);
        }

        // Quiz guidance
        if ($this->matches($msg, ['quiz', 'quizz', 'test', 'examen', 'évaluation', 'score', 'résultat'])) {
            return $this->handleQuizQuestion($msg);
        }

        // Budget
        if ($this->matches($msg, ['budget', 'budgétisation', 'planifier', 'dépenses', 'revenus', 'charges'])) {
            return $this->handleBudget();
        }

        // Saving
        if ($this->matches($msg, ['épargne', 'epargne', 'économiser', 'économies', 'mettre de côté', 'fonds d\'urgence'])) {
            return $this->handleSaving();
        }

        // Investment
        if ($this->matches($msg, ['investissement', 'investir', 'bourse', 'actions', 'obligations', 'portefeuille', 'rendement', 'placement'])) {
            return $this->handleInvestment();
        }

        // Fintech
        if ($this->matches($msg, ['fintech', 'finance numérique', 'paiement mobile', 'banque en ligne', 'cryptomonnaie', 'blockchain'])) {
            return $this->handleFintech();
        }

        // Progress / learning path
        if ($this->matches($msg, ['progression', 'avancement', 'par où commencer', 'débutant', 'niveau', 'apprentissage', 'commencer'])) {
            return $this->handleLearningPath($msg);
        }

        // Recommendation
        if ($this->matches($msg, ['recommandation', 'recommander', 'suggérer', 'suggestion', 'que faire ensuite', 'prochain cours'])) {
            return "Pour obtenir des recommandations personnalisées, passez un quiz ! Après votre résultat, notre système génère automatiquement des suggestions de cours adaptées à vos points faibles. Rendez-vous sur la page <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a> pour commencer.";
        }

        // Notification
        if ($this->matches($msg, ['notification', 'alerte', 'message'])) {
            return "Les notifications Dinari vous informent de vos résultats de quiz et de vos recommandations personnalisées. Elles apparaissent automatiquement après chaque quiz. Consultez la page <a href='/notifications' style='color:var(--dinari-blue)'>Notifications</a> pour les voir toutes.";
        }

        // Fallback: try to match against actual course/chapter titles in DB
        $dbAnswer = $this->searchKnowledgeBase($msg);
        if ($dbAnswer) {
            return $dbAnswer;
        }

        return "Je ne suis pas sûr de comprendre votre question. Essayez de me demander :\n• \"Quels cours sont disponibles ?\"\n• \"Explique-moi le budget\"\n• \"Comment fonctionne un quiz ?\"\n• \"Qu'est-ce que l'épargne ?\"\n• \"Par où commencer ?\"\n\nJe suis spécialisé dans les cours fintech et les concepts financiers de la plateforme Dinari.";
    }

    // ─── Handlers ────────────────────────────────────────────────────────────

    private function handleCourseList(string $msg): string
    {
        $courses = $this->coursRepo->findBy([], ['id' => 'ASC']);

        if (empty($courses)) {
            return "Aucun cours n'est disponible pour le moment. Revenez bientôt !";
        }

        // Check if asking about a specific level
        $level = null;
        if (str_contains($msg, 'débutant') || str_contains($msg, 'debutant')) $level = 'debutant';
        elseif (str_contains($msg, 'intermédiaire') || str_contains($msg, 'intermediaire')) $level = 'intermediaire';
        elseif (str_contains($msg, 'avancé') || str_contains($msg, 'avance')) $level = 'avance';

        $filtered = $level
            ? array_filter($courses, fn($c) => $c->getNiveau() === $level)
            : $courses;

        if (empty($filtered)) {
            return "Aucun cours de niveau \"$level\" trouvé. Essayez un autre niveau.";
        }

        $lines = ["Voici les cours disponibles sur Dinari :\n"];
        foreach ($filtered as $c) {
            $niv = $c->getNiveau() ? " (" . ucfirst($c->getNiveau()) . ")" : '';
            $desc = $c->getDescription() ? ' — ' . mb_substr($c->getDescription(), 0, 80) . '...' : '';
            $lines[] = "📚 <strong>" . htmlspecialchars($c->getNomCours() ?? '') . "</strong>$niv$desc";
        }
        $lines[] = "\nCliquez sur <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a> pour accéder à tous les cours.";

        return implode("\n", $lines);
    }

    private function handleChapterQuestion(string $msg): string
    {
        // Try to find a specific course name in the message
        $courses = $this->coursRepo->findBy([], ['id' => 'ASC']);
        foreach ($courses as $cours) {
            $name = mb_strtolower($cours->getNomCours() ?? '');
            if ($name && str_contains($msg, $name)) {
                $chapitres = $cours->getChapitres();
                if ($chapitres->isEmpty()) {
                    return "Le cours \"" . $cours->getNomCours() . "\" n'a pas encore de chapitres.";
                }
                $lines = ["Le cours <strong>" . htmlspecialchars($cours->getNomCours()) . "</strong> contient " . $chapitres->count() . " chapitre(s) :\n"];
                foreach ($chapitres as $ch) {
                    $sub = $ch->getSousTitre() ? ' — ' . $ch->getSousTitre() : '';
                    $lines[] = "📖 " . htmlspecialchars($ch->getTitre()) . $sub;
                }
                return implode("\n", $lines);
            }
        }

        // Generic chapter info
        $total = count($this->chapitreRepo->findAll());
        return "Les chapitres sont les unités d'apprentissage de chaque cours. Chaque chapitre contient une introduction, un contenu principal, des points clés à retenir, et parfois une vidéo ou des exercices pratiques.\n\nLa plateforme compte actuellement <strong>$total chapitre(s)</strong> au total.\n\nPour voir les chapitres d'un cours spécifique, rendez-vous sur <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a>.";
    }

    private function handleQuizQuestion(string $msg): string
    {
        $quizzes = $this->quizRepo->findAll();
        $count   = count($quizzes);

        if (str_contains($msg, 'réponse') || str_contains($msg, 'reponse') || str_contains($msg, 'solution')) {
            return "Je ne peux pas vous donner les réponses directement — ce serait tricher ! 😄\n\nMais voici quelques conseils :\n• Relisez attentivement le chapitre correspondant\n• Cherchez les mots-clés dans le contenu du cours\n• Faites confiance à votre première intuition\n• En mode examen, gérez bien votre temps\n\nBonne chance ! 💪";
        }

        if (str_contains($msg, 'score') || str_contains($msg, 'résultat') || str_contains($msg, 'résultats')) {
            return "Votre score de quiz est calculé automatiquement après chaque tentative. Un score ≥ 80% déclenche un message de félicitations, et un score < 50% génère une recommandation de révision.\n\nConsultez vos résultats et recommandations sur la page <a href='/notifications' style='color:var(--dinari-blue)'>Notifications</a>.";
        }

        if (str_contains($msg, 'examen') || str_contains($msg, 'exam')) {
            return "Le mode examen est une version chronométrée du quiz. Vous avez un temps limité pour répondre à toutes les questions. Ce mode simule les conditions d'un vrai examen pour mieux vous préparer.";
        }

        return "Les quiz Dinari testent vos connaissances sur les cours fintech. La plateforme propose actuellement <strong>$count quiz</strong>.\n\n📝 Comment ça marche :\n• Chaque quiz est lié à un cours\n• Répondez aux questions à choix multiples\n• Votre score est calculé immédiatement\n• Des recommandations personnalisées sont générées selon vos résultats\n• Le mode examen ajoute une limite de temps\n\nAccédez aux quiz depuis la page <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a>.";
    }

    private function handleBudget(): string
    {
        return "💰 <strong>Le Budget — Concept clé</strong>\n\nUn budget est un plan financier qui répartit vos revenus entre vos dépenses, votre épargne et vos investissements.\n\n<strong>La règle 50/30/20 :</strong>\n• 50% → Besoins essentiels (loyer, nourriture, transport)\n• 30% → Envies (loisirs, restaurants, shopping)\n• 20% → Épargne et remboursement de dettes\n\n<strong>Étapes pour créer un budget :</strong>\n1. Calculez vos revenus nets mensuels\n2. Listez toutes vos dépenses fixes\n3. Identifiez vos dépenses variables\n4. Fixez un objectif d'épargne\n5. Suivez et ajustez chaque mois\n\nPour approfondir ce sujet, consultez nos cours sur la gestion financière.";
    }

    private function handleSaving(): string
    {
        return "🏦 <strong>L'Épargne — Concept clé</strong>\n\nL'épargne consiste à mettre de côté une partie de vos revenus pour des besoins futurs.\n\n<strong>Types d'épargne :</strong>\n• Fonds d'urgence : 3 à 6 mois de dépenses (priorité absolue)\n• Épargne court terme : vacances, achat prévu dans 1-2 ans\n• Épargne long terme : retraite, achat immobilier\n\n<strong>Conseils pratiques :</strong>\n• Automatisez votre épargne dès réception du salaire\n• Commencez petit (même 5% de vos revenus)\n• Utilisez des comptes séparés pour chaque objectif\n• Évitez de puiser dans votre fonds d'urgence\n\nNos cours fintech couvrent en détail les stratégies d'épargne adaptées au contexte tunisien.";
    }

    private function handleInvestment(): string
    {
        return "📈 <strong>L'Investissement — Concept clé</strong>\n\nInvestir, c'est faire travailler votre argent pour générer des rendements sur le long terme.\n\n<strong>Principes fondamentaux :</strong>\n• Diversification : ne mettez pas tous vos œufs dans le même panier\n• Horizon temporel : plus c'est long, plus vous pouvez prendre de risques\n• Risque/rendement : un rendement élevé implique un risque élevé\n• Commencez tôt : les intérêts composés sont votre meilleur allié\n\n<strong>Types d'investissements :</strong>\n• Actions (bourse) — rendement potentiel élevé, risque élevé\n• Obligations — rendement modéré, risque faible\n• Immobilier — rendement stable, capital important requis\n• Fonds d'investissement — diversification automatique\n\n⚠️ Investissez uniquement l'argent que vous pouvez vous permettre de perdre. Consultez nos cours pour en savoir plus.";
    }

    private function handleFintech(): string
    {
        return "🚀 <strong>La Fintech — Finance & Technologie</strong>\n\nLa fintech (financial technology) désigne l'ensemble des innovations technologiques appliquées aux services financiers.\n\n<strong>Domaines clés :</strong>\n• Paiements mobiles et sans contact\n• Banque en ligne et néobanques\n• Prêts entre particuliers (P2P lending)\n• Robo-advisors (gestion automatisée)\n• Blockchain et cryptomonnaies\n• Assurtech (assurance numérique)\n\n<strong>En Tunisie :</strong>\nLe secteur fintech tunisien est en pleine croissance avec des initiatives comme le paiement mobile, les startups de microfinance et les solutions de transfert d'argent.\n\nDinari vous forme aux concepts fintech essentiels pour naviguer dans ce monde en évolution rapide.";
    }

    private function handleLearningPath(string $msg): string
    {
        $courses = $this->coursRepo->findBy([], ['id' => 'ASC']);

        $debutant = array_filter($courses, fn($c) => $c->getNiveau() === 'debutant');
        $inter    = array_filter($courses, fn($c) => $c->getNiveau() === 'intermediaire');
        $avance   = array_filter($courses, fn($c) => $c->getNiveau() === 'avance');

        $path = "🎯 <strong>Votre parcours d'apprentissage Dinari</strong>\n\n";

        if (!empty($debutant)) {
            $path .= "🟢 <strong>Niveau Débutant :</strong>\n";
            foreach ($debutant as $c) {
                $path .= "  • " . htmlspecialchars($c->getNomCours() ?? '') . "\n";
            }
        }
        if (!empty($inter)) {
            $path .= "\n🟡 <strong>Niveau Intermédiaire :</strong>\n";
            foreach ($inter as $c) {
                $path .= "  • " . htmlspecialchars($c->getNomCours() ?? '') . "\n";
            }
        }
        if (!empty($avance)) {
            $path .= "\n🔴 <strong>Niveau Avancé :</strong>\n";
            foreach ($avance as $c) {
                $path .= "  • " . htmlspecialchars($c->getNomCours() ?? '') . "\n";
            }
        }

        if (empty($debutant) && empty($inter) && empty($avance)) {
            $path .= "Commencez par n'importe quel cours disponible sur la page <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a>.";
        } else {
            $path .= "\n💡 Conseil : commencez par le niveau débutant, passez les quiz, et suivez les recommandations personnalisées pour progresser.";
        }

        return $path;
    }

    /**
     * Search actual course/chapter titles and content in the database.
     */
    private function searchKnowledgeBase(string $msg): ?string
    {
        // Search courses by name or theme
        $courses = $this->coursRepo->findAll();
        foreach ($courses as $cours) {
            $name    = mb_strtolower($cours->getNomCours() ?? '');
            $theme   = mb_strtolower($cours->getTheme() ?? '');
            $desc    = mb_strtolower($cours->getDescription() ?? '');
            $keywords = array_filter(array_map('trim', explode(',', $theme)));

            $matched = false;
            if ($name && str_contains($msg, $name)) $matched = true;
            foreach ($keywords as $kw) {
                if ($kw && str_contains($msg, $kw)) { $matched = true; break; }
            }

            if ($matched) {
                $chapCount = $cours->getChapitres()->count();
                $quizCount = $cours->getQuizzes()->count();
                $niv = $cours->getNiveau() ? ' (Niveau : ' . ucfirst($cours->getNiveau()) . ')' : '';
                $descText = $cours->getDescription() ? "\n\n" . mb_substr($cours->getDescription(), 0, 200) . '...' : '';
                return "📚 <strong>" . htmlspecialchars($cours->getNomCours() ?? '') . "</strong>$niv$descText\n\n• $chapCount chapitre(s) disponible(s)\n• $quizCount quiz associé(s)\n\nAccédez à ce cours sur <a href='/cours' style='color:var(--dinari-blue)'>Cours Fintech</a>.";
            }
        }

        // Search chapters by title
        $chapitres = $this->chapitreRepo->findAll();
        foreach ($chapitres as $ch) {
            $titre = mb_strtolower($ch->getTitre());
            if (str_contains($msg, $titre) || (strlen($titre) > 4 && str_contains($titre, $msg))) {
                $intro = $ch->getIntro() ?? $ch->getContenu() ?? '';
                $aRetenir = $ch->getARetenir();
                $coursName = $ch->getCours()?->getNomCours() ?? 'un cours';

                $response = "📖 <strong>" . htmlspecialchars($ch->getTitre()) . "</strong>\n";
                if ($ch->getSousTitre()) $response .= "<em>" . htmlspecialchars($ch->getSousTitre()) . "</em>\n";
                $response .= "\nCe chapitre fait partie du cours <strong>" . htmlspecialchars($coursName) . "</strong>.";
                if ($intro) $response .= "\n\n" . mb_substr(strip_tags($intro), 0, 250) . '...';
                if ($aRetenir) $response .= "\n\n💡 <strong>À retenir :</strong> " . mb_substr(strip_tags($aRetenir), 0, 200) . '...';

                return $response;
            }
        }

        return null;
    }

    /**
     * Check if the message contains any of the given keywords.
     */
    private function matches(string $msg, array $keywords): bool
    {
        foreach ($keywords as $kw) {
            if (str_contains($msg, $kw)) return true;
        }
        return false;
    }
}
