<?php

namespace App\Controller;

use App\Repository\DepenseRepository;
use App\Repository\BudgetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chatbot')]
class ChatbotDepenseController extends AbstractController
{
    private const USER_ID = 1;

    #[Route('/message', name: 'chatbot_message', methods: ['POST'])]
    public function message(
        Request            $request,
        DepenseRepository  $depenseRepo,
        BudgetRepository   $budgetRepo
    ): JsonResponse {

        $data    = json_decode($request->getContent(), true);
        $message = trim(strtolower($data['message'] ?? ''));

        if ($message === '') {
            return $this->json(['reply' => "Je n'ai pas compris votre message. Posez-moi une question sur vos dépenses ou votre budget."]);
        }

        $reply = $this->buildReply($message, $depenseRepo, $budgetRepo);

        return $this->json(['reply' => $reply]);
    }

    // ─────────────────────────────────────────────────────────────
    //  Intent matching + response builder
    // ─────────────────────────────────────────────────────────────
    private function buildReply(
        string            $msg,
        DepenseRepository $depenseRepo,
        BudgetRepository  $budgetRepo
    ): string {

        $userId       = self::USER_ID;
        $moisCourant  = (int) date('n');
        $anneeCourante = (int) date('Y');

        // ── TOTAL DÉPENSES (all time) ──────────────────────────────
        if ($this->matches($msg, ['total', 'dépensé', 'depense', 'combien', 'montant total', 'tout'])) {
            $total    = $depenseRepo->getTotalParUtilisateur($userId);
            $depenses = $depenseRepo->findByUtilisateur($userId);
            return sprintf(
                "💰 Vous avez effectué <strong>%s dépenses</strong> pour un total de <strong>%s DT</strong>.",
                count($depenses),
                number_format($total, 2, ',', ' ')
            );
        }

        // ── DÉPENSES DU MOIS ──────────────────────────────────────
        if ($this->matches($msg, ['mois', 'ce mois', 'mensuel', 'mensuelle', 'mois courant'])) {
            $depensesMois = $depenseRepo->findDuMois($userId);
            $totalMois    = array_sum(array_map(fn($d) => (float)$d->getMontant(), $depensesMois));
            $moisNom      = $this->nomMois($moisCourant);
            return sprintf(
                "📅 En <strong>%s %d</strong>, vous avez <strong>%d dépense(s)</strong> pour un total de <strong>%s DT</strong>.",
                $moisNom, $anneeCourante,
                count($depensesMois),
                number_format($totalMois, 2, ',', ' ')
            );
        }

        // ── BUDGET COURANT ────────────────────────────────────────
        if ($this->matches($msg, ['budget', 'limite', 'plafond', 'budget courant', 'budget du mois'])) {
            $budgetData = $budgetRepo->getBudgetAvecConsommation($userId, $moisCourant, $anneeCourante);
            if (!$budgetData) {
                return "📊 Aucun budget défini pour ce mois. Rendez-vous dans la section <strong>Budget</strong> pour en créer un.";
            }
            $moisNom = $this->nomMois($moisCourant);
            $icon    = $budgetData['depasse'] ? '🔴' : ($budgetData['pourcentage'] >= 80 ? '⚠️' : '✅');
            return sprintf(
                "%s Budget <strong>%s %d</strong> : <strong>%s DT</strong> dépensés sur <strong>%s DT</strong> (%s%% utilisé). Il vous reste <strong>%s DT</strong>.",
                $icon,
                $moisNom, $anneeCourante,
                number_format($budgetData['totalDepenses'], 2, ',', ' '),
                number_format($budgetData['limite'], 2, ',', ' '),
                $budgetData['pourcentage'],
                number_format($budgetData['restant'], 2, ',', ' ')
            );
        }

        // ── BUDGET DÉPASSÉ ────────────────────────────────────────
        if ($this->matches($msg, ['dépassé', 'depasse', 'dépasse', 'excédé', 'excede', 'trop dépensé'])) {
            $budgetData = $budgetRepo->getBudgetAvecConsommation($userId, $moisCourant, $anneeCourante);
            if (!$budgetData) {
                return "📊 Aucun budget défini pour ce mois. Je ne peux pas vérifier si vous l'avez dépassé.";
            }
            if ($budgetData['depasse']) {
                $depassement = $budgetData['totalDepenses'] - $budgetData['limite'];
                return sprintf(
                    "🔴 Oui, votre budget est <strong>dépassé</strong> de <strong>%s DT</strong> ce mois-ci. Essayez de réduire vos dépenses non essentielles.",
                    number_format($depassement, 2, ',', ' ')
                );
            }
            return sprintf(
                "✅ Non, votre budget n'est pas dépassé. Il vous reste encore <strong>%s DT</strong> à dépenser ce mois.",
                number_format($budgetData['restant'], 2, ',', ' ')
            );
        }

        // ── CATÉGORIES / STATISTIQUES ─────────────────────────────
        if ($this->matches($msg, ['catégorie', 'categorie', 'statistique', 'stat', 'répartition', 'repartition', 'plus dépensé', 'top'])) {
            $stats = $depenseRepo->totalParCategorie($userId);
            if (empty($stats)) {
                return "📊 Aucune statistique disponible pour le moment.";
            }
            $lines = ["📊 <strong>Répartition par catégorie :</strong><br>"];
            foreach (array_slice($stats, 0, 5) as $s) {
                $lines[] = "• <strong>{$s['categorie']}</strong> : " . number_format((float)$s['total'], 2, ',', ' ') . " DT";
            }
            return implode('<br>', $lines);
        }

        // ── CONSEILS D'ÉCONOMIE ───────────────────────────────────
        if ($this->matches($msg, ['conseil', 'astuce', 'économiser', 'economiser', 'épargner', 'epargner', 'réduire', 'reduire', 'tip', 'aide'])) {
            $tips = [
                "💡 <strong>Règle 50/30/20</strong> : Allouez 50% de vos revenus aux besoins, 30% aux envies et 20% à l'épargne.",
                "💡 Suivez vos dépenses <strong>quotidiennement</strong> pour repérer les fuites budgétaires rapidement.",
                "💡 Définissez un <strong>budget mensuel</strong> par catégorie et respectez-le strictement.",
                "💡 Évitez les achats impulsifs en attendant <strong>48h</strong> avant tout achat non planifié.",
                "💡 Comparez les prix et utilisez des <strong>applications de cashback</strong> pour réduire vos dépenses courantes.",
                "💡 Automatisez votre <strong>épargne</strong> en programmant un virement dès réception de votre salaire.",
            ];
            return $tips[array_rand($tips)];
        }

        // ── NOMBRE DE DÉPENSES ────────────────────────────────────
        if ($this->matches($msg, ['nombre', 'combien de dépenses', 'combien de depenses', 'count'])) {
            $depenses = $depenseRepo->findByUtilisateur($userId);
            return sprintf(
                "🔢 Vous avez enregistré <strong>%d dépense(s)</strong> au total.",
                count($depenses)
            );
        }

        // ── BONJOUR / SALUT ───────────────────────────────────────
        if ($this->matches($msg, ['bonjour', 'salut', 'hello', 'hi', 'bonsoir', 'coucou'])) {
            return "👋 Bonjour ! Je suis <strong>Dinari Assistant</strong>. Je peux vous aider avec vos dépenses et budgets. Que souhaitez-vous savoir ?";
        }

        // ── AIDE ──────────────────────────────────────────────────
        if ($this->matches($msg, ['aide', 'help', 'que peux-tu', 'que sais-tu', 'fonctions', 'capacités'])) {
            return "🤖 Je peux répondre à ces questions :<br>"
                . "• <strong>Total de mes dépenses</strong><br>"
                . "• <strong>Dépenses du mois</strong><br>"
                . "• <strong>Mon budget courant</strong><br>"
                . "• <strong>Budget dépassé ?</strong><br>"
                . "• <strong>Répartition par catégorie</strong><br>"
                . "• <strong>Conseils pour économiser</strong>";
        }

        // ── FALLBACK ──────────────────────────────────────────────
        return "🤔 Je n'ai pas compris votre question. Essayez : <em>\"total dépenses\"</em>, <em>\"budget du mois\"</em>, <em>\"budget dépassé ?\"</em> ou <em>\"conseils\"</em>.";
    }

    // ─────────────────────────────────────────────────────────────
    //  Helpers
    // ─────────────────────────────────────────────────────────────

    /**
     * Returns true if $msg contains at least one keyword from $keywords.
     * @param string[] $keywords
     */
    private function matches(string $msg, array $keywords): bool
    {
        foreach ($keywords as $kw) {
            if (str_contains($msg, $kw)) return true;
        }
        return false;
    }

    private function nomMois(int $mois): string
    {
        return [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars',
            4 => 'Avril',   5 => 'Mai',     6 => 'Juin',
            7 => 'Juillet', 8 => 'Août',    9 => 'Septembre',
            10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre',
        ][$mois] ?? '';
    }
}
