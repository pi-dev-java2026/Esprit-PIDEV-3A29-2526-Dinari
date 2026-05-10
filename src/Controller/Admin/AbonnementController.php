<?php

namespace App\Controller\Admin;

use App\Entity\Abonnement;
use App\Entity\Paiement;
use App\Entity\Promotion;
use App\Form\AbonnementType;
use App\Repository\AbonnementRepository;
use App\Repository\PaiementRepository;
use App\Service\ScraperService;
use App\Service\SubscriptionCatalog;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/abonnement')]
class AbonnementController extends AbstractController
{
    // ══════════════════════════════════════════════════════════════════════
    // INDEX
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/', name: 'admin_abonnement_index')]
    public function index(
        Request              $request,
        AbonnementRepository $repo,
        PaiementRepository   $paiementRepo
    ): Response {

        /** @var Abonnement[] $abonnements */
$abonnements = $repo->findForAdmin();
        
        /** @var Paiement[] $paiements */
        $paiements = $paiementRepo->findAllWithAbonnement();

        $stats = [
            'total'    => count($abonnements),
            'actifs'   => count(array_filter($abonnements, fn(Abonnement $a) => $a->getActif())),
            'inactifs' => count(array_filter($abonnements, fn(Abonnement $a) => !$a->getActif())),
            'premium'  => count(array_filter($abonnements, fn(Abonnement $a) => in_array($a->getTier(), ['Gold', 'Platinum']))),
        ];

        $paiementsPayes = array_filter($paiements, fn(Paiement $p) => $p->getStatut() === 'payé');
        $totalRevenus   = array_sum(array_map(fn(Paiement $p) => (float)$p->getMontant(), $paiementsPayes));
        $totalClients   = count($paiementsPayes);

        $stats['totalPaiements'] = count($paiements);
        $stats['totalClients']   = $totalClients;
        $stats['revenus']        = $totalRevenus;
        $stats['revenuMoyen']    = $totalClients > 0 ? round($totalRevenus / $totalClients, 2) : 0;

        $statsByAbo = [];
        foreach ($paiements as $p) {
            if (!$p instanceof Paiement) continue;
            $abo = $p->getAbonnementId();
            if (!$abo instanceof Abonnement) continue;
            $id = $abo->getId();
            if (!isset($statsByAbo[$id])) {
                $statsByAbo[$id] = ['nbClients' => 0, 'revenus' => 0.0];
            }
            $statsByAbo[$id]['nbClients']++;
            if ($p->getStatut() === 'payé') {
                $statsByAbo[$id]['revenus'] += (float)$p->getMontant();
            }
        }

        $topAbonnements = [];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $id = $abo->getId();
            $topAbonnements[] = [
                'id'         => $id,
                'nom'        => $abo->getNom(),
                'categorie'  => $abo->getCategorie(),
                'frequence'  => $abo->getFrequence(),
                'logoDomain' => $abo->getLogoDomain(),
                'nbClients'  => isset($statsByAbo[$id]) ? $statsByAbo[$id]['nbClients'] : 0,
                'revenus'    => isset($statsByAbo[$id]) ? $statsByAbo[$id]['revenus'] : 0.0,
            ];
        }
        usort($topAbonnements, fn($a, $b) => $b['nbClients'] <=> $a['nbClients']);
        $topAbonnementsDisplay = array_slice($topAbonnements, 0, 6);

        $topRevenus = $topAbonnements;
        usort($topRevenus, fn($a, $b) => $b['revenus'] <=> $a['revenus']);
        $topRevenus    = array_slice($topRevenus, 0, 8);
        $maxTopRevenus = !empty($topRevenus) ? max(array_column($topRevenus, 'revenus')) : 1;

        $aboLePlusDemande = !empty($topAbonnementsDisplay) && $topAbonnementsDisplay[0]['nbClients'] > 0
            ? $topAbonnementsDisplay[0]
            : null;

        $parCategorie = [];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $cat = $abo->getCategorie() ?? 'autre';
            $parCategorie[$cat] = ($parCategorie[$cat] ?? 0) + 1;
        }
        arsort($parCategorie);
        $maxParCategorie = !empty($parCategorie) ? max($parCategorie) : 1;

        $parTier = ['Normal' => 0, 'Silver' => 0, 'Gold' => 0, 'Platinum' => 0];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $t = $abo->getTier() ?? 'Normal';
            $parTier[$t] = ($parTier[$t] ?? 0) + 1;
        }
        $parTier = array_filter($parTier, fn($v) => $v > 0);

        $today     = new \DateTime('today');
        $soonLimit = (new \DateTime('today'))->modify('+30 days');
        $totalPrix = array_sum(array_map(fn(Abonnement $a) => (float)$a->getPrix(), $abonnements));

        $expirantBientot = count(array_filter($abonnements, function(Abonnement $a) use ($today, $soonLimit) {
            $fin = $a->getDateFinOffre();
            return $fin && $fin >= $today && $fin <= $soonLimit;
        }));

        $packsAvecPromo = count(array_filter($abonnements, fn(Abonnement $a) => count($a->getPromotions()) > 0));
        $packsEnAvant   = count(array_filter($abonnements, fn(Abonnement $a) => $a->getMisEnAvant()));
        $packsAvecEssai = count(array_filter($abonnements, fn(Abonnement $a) => $a->getEssaiGratuit() > 0));
        $tauxActivation = $stats['total'] > 0 ? round($stats['actifs'] / $stats['total'] * 100) : 0;
        $prixMoyen      = $stats['total'] > 0 ? round($totalPrix / $stats['total'], 2) : 0;

        $stats = array_merge($stats, [
            'topAbonnements'   => $topAbonnementsDisplay,
            'topRevenus'       => $topRevenus,
            'aboLePlusDemande' => $aboLePlusDemande,
            'parCategorie'     => $parCategorie,
            'parTier'          => $parTier,
            'tauxActivation'   => $tauxActivation,
            'prixMoyen'        => $prixMoyen,
            'packsAvecPromo'   => $packsAvecPromo,
            'packsEnAvant'     => $packsEnAvant,
            'expirantBientot'  => $expirantBientot,
            'packsAvecEssai'   => $packsAvecEssai,
            'maxParCategorie'  => $maxParCategorie,
            'maxTopRevenus'    => $maxTopRevenus,
        ]);

        $grouped = $repo->findGroupedByNom();

        return $this->render('admin/abonnement/index.html.twig', [
            'abonnements' => $abonnements,
            'stats'       => $stats,
            'statsByAbo'  => $statsByAbo,
            'grouped'     => $grouped,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // SEARCH AJAX
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/search-ajax', name: 'admin_abonnement_search_ajax', methods: ['GET'])]
    public function searchAjax(Request $request, AbonnementRepository $repo): JsonResponse
    {
        $q      = trim((string) $request->query->get('q', ''));
        $tier   = trim((string) $request->query->get('tier', ''));
        $statut = trim((string) $request->query->get('statut', ''));
        $cat    = trim((string) $request->query->get('cat', ''));

        /** @var Abonnement[] $abonnements */
        $abonnements = $repo->search($q, $tier, $statut, $cat, false);

        $data = array_map(fn(Abonnement $abo) => [
            'id'              => $abo->getId(),
            'nom'             => $abo->getNom(),
            'categorie'       => $abo->getCategorie(),
            'tier'            => $abo->getTier(),
            'frequence'       => $abo->getFrequence(),
            'actif'           => $abo->getActif(),
            'prixEffectif'    => $abo->getPrixEffectif(),
            'prixMarche'      => $abo->getPrixMarche(),
            'logoDomain'      => $abo->getLogoDomain(),
            'createdAt'       => $abo->getCreatedAt()->format('d/m/Y'),
            'economiePercent' => $abo->getEconomiePercent(),
            'badge'           => $abo->getBadge(),
            'misEnAvant'      => $abo->getMisEnAvant(),
        ], $abonnements);

        return $this->json($data);
    }

    // ══════════════════════════════════════════════════════════════════════
    // STATISTIQUES
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/statistiques', name: 'admin_stats')]
    public function statistiques(
        AbonnementRepository $repo,
        PaiementRepository   $paiementRepo
    ): Response {
        /** @var Abonnement[] $abonnements */
        $abonnements = $repo->findBy([], ['created_at' => 'DESC']);
        
        /** @var Paiement[] $paiements */
        $paiements = $paiementRepo->findAllWithAbonnement();

        $stats = [
            'total'    => count($abonnements),
            'actifs'   => count(array_filter($abonnements, fn(Abonnement $a) => $a->getActif())),
            'inactifs' => count(array_filter($abonnements, fn(Abonnement $a) => !$a->getActif())),
            'premium'  => count(array_filter($abonnements, fn(Abonnement $a) => in_array($a->getTier(), ['Gold', 'Platinum']))),
        ];

        $paiementsPayes = array_filter($paiements, fn(Paiement $p) => $p->getStatut() === 'payé');
        $totalRevenus   = array_sum(array_map(fn(Paiement $p) => (float)$p->getMontant(), $paiementsPayes));
        $totalClients   = count($paiementsPayes);

        $stats['totalPaiements'] = count($paiements);
        $stats['totalClients']   = $totalClients;
        $stats['revenus']        = $totalRevenus;
        $stats['revenuMoyen']    = $totalClients > 0 ? round($totalRevenus / $totalClients, 2) : 0;

        $statsByAbo = [];
        foreach ($paiements as $p) {
            if (!$p instanceof Paiement) continue;
            $abo = $p->getAbonnementId();
            if (!$abo instanceof Abonnement) continue;
            $id = $abo->getId();
            if (!isset($statsByAbo[$id])) {
                $statsByAbo[$id] = ['nbClients' => 0, 'revenus' => 0.0];
            }
            $statsByAbo[$id]['nbClients']++;
            if ($p->getStatut() === 'payé') {
                $statsByAbo[$id]['revenus'] += (float)$p->getMontant();
            }
        }

        $topAbonnements = [];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $id = $abo->getId();
            $topAbonnements[] = [
                'id'         => $id,
                'nom'        => $abo->getNom(),
                'categorie'  => $abo->getCategorie(),
                'frequence'  => $abo->getFrequence(),
                'logoDomain' => $abo->getLogoDomain(),
                'nbClients'  => isset($statsByAbo[$id]) ? $statsByAbo[$id]['nbClients'] : 0,
                'revenus'    => isset($statsByAbo[$id]) ? $statsByAbo[$id]['revenus'] : 0.0,
            ];
        }
        usort($topAbonnements, fn($a, $b) => $b['nbClients'] <=> $a['nbClients']);
        $topAbonnementsDisplay = array_slice($topAbonnements, 0, 6);

        $topRevenus = $topAbonnements;
        usort($topRevenus, fn($a, $b) => $b['revenus'] <=> $a['revenus']);
        $topRevenus    = array_slice($topRevenus, 0, 8);
        $maxTopRevenus = !empty($topRevenus) ? max(array_column($topRevenus, 'revenus')) : 1;

        $aboLePlusDemande = !empty($topAbonnementsDisplay) && $topAbonnementsDisplay[0]['nbClients'] > 0
            ? $topAbonnementsDisplay[0]
            : null;

        $parCategorie = [];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $cat = $abo->getCategorie() ?? 'autre';
            $parCategorie[$cat] = ($parCategorie[$cat] ?? 0) + 1;
        }
        arsort($parCategorie);
        $maxParCategorie = !empty($parCategorie) ? max($parCategorie) : 1;

        $parTier = ['Normal' => 0, 'Silver' => 0, 'Gold' => 0, 'Platinum' => 0];
        foreach ($abonnements as $abo) {
            if (!$abo instanceof Abonnement) continue;
            $t = $abo->getTier() ?? 'Normal';
            $parTier[$t] = ($parTier[$t] ?? 0) + 1;
        }
        $parTier = array_filter($parTier, fn($v) => $v > 0);

        $today     = new \DateTime('today');
        $soonLimit = (new \DateTime('today'))->modify('+30 days');
        $totalPrix = array_sum(array_map(fn(Abonnement $a) => (float)$a->getPrix(), $abonnements));

        $expirantBientot = count(array_filter($abonnements, function(Abonnement $a) use ($today, $soonLimit) {
            $fin = $a->getDateFinOffre();
            return $fin && $fin >= $today && $fin <= $soonLimit;
        }));

        $packsAvecPromo = count(array_filter($abonnements, fn(Abonnement $a) => count($a->getPromotions()) > 0));
        $packsEnAvant   = count(array_filter($abonnements, fn(Abonnement $a) => $a->getMisEnAvant()));
        $packsAvecEssai = count(array_filter($abonnements, fn(Abonnement $a) => $a->getEssaiGratuit() > 0));
        $tauxActivation = $stats['total'] > 0 ? round($stats['actifs'] / $stats['total'] * 100) : 0;
        $prixMoyen      = $stats['total'] > 0 ? round($totalPrix / $stats['total'], 2) : 0;

        $stats = array_merge($stats, [
            'topAbonnements'   => $topAbonnementsDisplay,
            'topRevenus'       => $topRevenus,
            'aboLePlusDemande' => $aboLePlusDemande,
            'parCategorie'     => $parCategorie,
            'parTier'          => $parTier,
            'tauxActivation'   => $tauxActivation,
            'prixMoyen'        => $prixMoyen,
            'packsAvecPromo'   => $packsAvecPromo,
            'packsEnAvant'     => $packsEnAvant,
            'expirantBientot'  => $expirantBientot,
            'packsAvecEssai'   => $packsAvecEssai,
            'maxParCategorie'  => $maxParCategorie,
            'maxTopRevenus'    => $maxTopRevenus,
        ]);

        return $this->render('admin/abonnement/statistiques.html.twig', [
            'stats' => $stats,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // CATALOGUE
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/catalogue', name: 'admin_abonnement_catalogue')]
    public function catalogue(AbonnementRepository $repo): Response
    {
        /** @var Abonnement[] $abonnements */
        $abonnements = $repo->findAll();
        $nomsExistants = array_map(fn(Abonnement $a) => strtolower($a->getNom()), $abonnements);
        
        return $this->render('admin/abonnement/catalogue.html.twig', [
            'catalogue'      => SubscriptionCatalog::getAll(),
            'grouped'        => SubscriptionCatalog::groupedByCategorie(),
            'noms_existants' => $nomsExistants,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // PREFILL (API JSON pour le catalogue)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/prefill/{slug}', name: 'admin_abonnement_prefill')]
    public function prefill(string $slug, ScraperService $scraper): JsonResponse
    {
        $service = SubscriptionCatalog::getBySlug($slug);
        if (!$service) {
            return $this->json(['error' => 'Service introuvable'], 404);
        }
        return $this->json([
            'nom'         => $service['nom'],
            'categorie'   => $service['categorie'],
            'tier'        => $service['tier'],
            'description' => $service['description'],
            'couleur'     => $service['couleur'],
            'logo_url'    => $scraper->getLogoUrl((string) $service['logo_domain']),
            'logo_domain' => $service['logo_domain'],
            'features'    => $service['features'],
            'prix'        => $service['prix'],
            'site'        => $service['site'],
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // NEW — formulaire classique (1 seul abonnement)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/new', name: 'admin_abonnement_new')]
    #[Route('/new/{slug}', name: 'admin_abonnement_new_from_slug')]
    public function new(
        Request                $request,
        EntityManagerInterface $em,
        ScraperService         $scraper,
        ?string                $slug = null
    ): Response {
        $abonnement = new Abonnement();
        $presetData = null;
        $logoUrl    = null;
        $prixMarche = null;
        $prixDinari = null;

        if ($slug) {
            $service = SubscriptionCatalog::getBySlug($slug);
            if ($service) {
                $frequence      = (string) $request->query->get('frequence', 'mensuel');
                $prixDinari     = (float)($service['prix'][$frequence] ?? $service['prix']['mensuel']);
                $prixMarcheBase = (float)$service['prix']['mensuel'];
                $prixMarche     = $prixMarcheBase <= $prixDinari
                    ? round($prixDinari * 1.20, 2)
                    : $prixMarcheBase;

                $abonnement->setNom((string) $service['nom'])
                           ->setPrix($prixDinari)
                           ->setPrixMarche((float) $prixMarche)
                           ->setFrequence($frequence)
                           ->setCategorie((string) $service['categorie'])
                           ->setTier((string) $service['tier'])
                           ->setLogoDomain((string) $service['logo_domain'])
                           ->setActif(false);

                $presetData = $service;
                $logoUrl    = $scraper->getLogoUrl((string) $service['logo_domain']);
            }
        }

        $form = $this->createForm(AbonnementType::class, $abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($abonnement);
            $em->flush();
            $this->addFlash('success', '✅ "' . $abonnement->getNom() . '" créé.');
            return $this->redirectToRoute('admin_abonnement_index');
        }

        return $this->render('admin/abonnement/new.html.twig', [
            'form'        => $form->createView(),
            'preset_data' => $presetData,
            'logo_url'    => $logoUrl,
            'slug'        => $slug,
            'prix_marche' => $prixMarche,
            'prix_dinari' => $prixDinari,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // MULTI-PLANS — enregistrement en BDD (POST)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/multi-plans/save', name: 'admin_abonnement_multi_save', methods: ['POST'])]
    public function multiSave(
        Request                $request,
        EntityManagerInterface $em,
        AbonnementRepository   $repo
    ): Response {
        $plans          = $request->request->all('plans');
        $serviceNom     = (string) $request->request->get('service_nom', '');
        $serviceCouleur = (string) $request->request->get('service_couleur', '#007f8c');
        $serviceCateg   = (string) $request->request->get('service_categorie', '');
        $serviceLogoD   = (string) $request->request->get('service_logo_domain', '');

        if (empty($plans)) {
            $this->addFlash('error', '❌ Aucun plan soumis. Ajoutez au moins un plan.');
            return $this->redirectToRoute('admin_abonnement_catalogue');
        }

        $created = 0;

        foreach ($plans as $planData) {
            $nomPlan    = trim((string) ($planData['nom_plan'] ?? ''));
            $prix       = (float)($planData['prix'] ?? 0);
            $prixMarche = (float)($planData['prix_marche'] ?? 0);
            $frequence  = trim((string) ($planData['frequence'] ?? 'mensuel'));
            $tier       = trim((string) ($planData['tier'] ?? 'Normal'));
            $badgeLabel = trim((string) ($planData['badge_label'] ?? ''));
            $desc       = trim((string) ($planData['description'] ?? ''));

            if (!$nomPlan || $prix <= 0) {
                continue;
            }

            $nomComplet = trim($serviceNom . ' ' . $nomPlan);

            $abo = new Abonnement();
            $abo->setNom($nomComplet)
                ->setPrix($prix)
                ->setPrixMarche($prixMarche > 0 ? (float) $prixMarche : null)
                ->setFrequence($frequence)
                ->setCategorie($serviceCateg)
                ->setTier($tier)
                ->setLogoDomain($serviceLogoD)
                ->setDescription($desc ?: null)
                ->setBadge($badgeLabel ?: null)
                ->setActif(false);

            if (!empty($planData['promotions']) && is_array($planData['promotions'])) {
                foreach ($planData['promotions'] as $promoData) {
                    $type       = trim((string) ($promoData['type'] ?? ''));
                    $redPct     = (int)($promoData['reduction_pct'] ?? 0);
                    $conditions = trim((string) ($promoData['conditions'] ?? ''));

                    if (!$type || $redPct <= 0 || $redPct > 100) {
                        continue;
                    }

                    $promo = new Promotion();
                    $promo->setType($type)
                          ->setReductionPct($redPct)
                          ->setConditions($conditions ?: null)
                          ->setAbonnement($abo)
                          ->setDateDebut(new \DateTime())
                          ->setDateFin((new \DateTime())->modify('+1 year'));

                    $em->persist($promo);
                    $abo->addPromotion($promo);
                }
            }

            $em->persist($abo);
            $created++;
        }

        if ($created === 0) {
            $this->addFlash('error', '❌ Aucun plan valide. Vérifiez que chaque plan a un nom et un prix.');
            return $this->redirectToRoute('admin_abonnement_catalogue');
        }

        $em->flush();

        $this->addFlash(
            'success',
            sprintf('✅ %d plan(s) créé(s) pour « %s ». Activez-les depuis la liste.', $created, $serviceNom)
        );

        return $this->redirectToRoute('admin_abonnement_index');
    }

    // ══════════════════════════════════════════════════════════════════════
    // MULTI-PLANS — affichage du formulaire (Spotify-style)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/multi-plans/{slug}', name: 'admin_abonnement_multi_plans')]
    public function multiPlans(string $slug, ScraperService $scraper): Response
    {
        $service = SubscriptionCatalog::getBySlug($slug);
        if (!$service) {
            throw $this->createNotFoundException('Service introuvable dans le catalogue.');
        }

        $service['slug'] = $slug;
        $logoUrl = $scraper->getLogoUrl((string) $service['logo_domain']);

        return $this->render('admin/abonnement/new_multi.html.twig', [
            'service'  => $service,
            'logo_url' => $logoUrl,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // AI PROXY — génère les plans via Groq (appelé depuis le JS)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/ai/generate-plans', name: 'admin_ai_generate_plans', methods: ['POST'])]
    public function generatePlans(Request $request): JsonResponse
    {
        $data        = json_decode((string) $request->getContent(), true);
        $serviceNom  = (string) ($data['service_nom'] ?? '');
        $categorie   = (string) ($data['service_categorie'] ?? '');
        $tier        = (string) ($data['service_tier'] ?? 'Normal');
        $prixRef     = (float) ($data['prix_ref'] ?? 10);

        if (!$serviceNom) {
            return $this->json(['error' => 'service_nom manquant'], 400);
        }

        $apiKey = $_ENV['GROQ_API_KEY'] ?? '';
        if (!$apiKey) {
            return $this->json(['error' => 'GROQ_API_KEY non configurée dans .env'], 500);
        }

        $prompt = <<<PROMPT
Tu es un expert en abonnements numériques.
Pour le service "{$serviceNom}" (catégorie: {$categorie}, tier: {$tier}),
génère tous les plans d'abonnement disponibles sur le marché tunisien, comme Spotify le fait
(Personnel, Étudiants, Duo, Famille selon la pertinence du service).

Prix de référence mensuel : {$prixRef} DT.

Réponds UNIQUEMENT avec un JSON valide, sans markdown, sans explication, sans balises :
{
  "plans": [
    {
      "nom_plan": "Personnel",
      "frequence": "mensuel",
      "prix": 9.99,
      "prix_marche": 12.99,
      "tier": "Silver",
      "badge_label": "12,50 DT pour 2 mois",
      "description": "1 compte Premium · Annulez à tout moment",
      "promotions": [
        { "type": "fidelite", "reduction_pct": 20, "conditions": "" }
      ]
    }
  ]
}

Règles :
- 2 à 4 plans pertinents selon le service
- prix TOUJOURS inférieur à prix_marche
- badge_label = texte affiché en haut de la carte (ex: "0 DT pour 1 mois")
- promotions : tableau [] si aucune, sinon type parmi: etudiant, famille, fidelite, limitee
- Réponds UNIQUEMENT avec le JSON brut, rien d'autre
PROMPT;

        $ch = curl_init('https://api.groq.com/openai/v1/chat/completions');

        $postFields = json_encode([
            'model'       => 'llama-3.3-70b-versatile',
            'max_tokens'  => 1500,
            'temperature' => 0.7,
            'messages'    => [
                [
                    'role'    => 'system',
                    'content' => 'Tu es un assistant expert en abonnements numériques. Tu réponds UNIQUEMENT en JSON brut valide, sans markdown, sans texte avant ou après.',
                ],
                [
                    'role'    => 'user',
                    'content' => $prompt,
                ],
            ],
        ]);

        if ($postFields === false) {
            return $this->json(['error' => 'Erreur encodage JSON'], 500);
        }

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey,
            ],
            CURLOPT_POSTFIELDS     => $postFields,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_SSL_VERIFYPEER => true,
        ]);

        $raw      = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErr  = curl_error($ch);
        curl_close($ch);

        if ($curlErr) {
            return $this->json(['error' => 'cURL error: ' . $curlErr], 500);
        }

        if ($raw === false || $raw === '') {
            return $this->json(['error' => 'Empty response from Groq API'], 500);
        }

        /** @var array<string, mixed> $groqResp */
        $groqResp = json_decode((string) $raw, true);

        if ($httpCode !== 200) {
            $msg = isset($groqResp['error']['message']) ? $groqResp['error']['message'] : "HTTP $httpCode";
            return $this->json(['error' => $msg], 500);
        }

        $text = (string) ($groqResp['choices'][0]['message']['content'] ?? '');

        // Nettoyer markdown éventuel
        $text = (string) preg_replace('/```json\s*/i', '', $text);
        $text = (string) preg_replace('/```\s*/i', '', $text);
        $text = trim($text);

        // Extraire le JSON
        if (!preg_match('/\{[\s\S]*\}/', $text, $m)) {
            return $this->json(['error' => 'JSON introuvable dans la réponse IA. Réponse brute: ' . substr($text, 0, 300)], 500);
        }

        /** @var array<string, mixed> $plans */
        $plans = json_decode($m[0], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->json(['error' => 'JSON invalide: ' . json_last_error_msg()], 500);
        }

        if (empty($plans['plans'])) {
            return $this->json(['error' => 'Aucun plan dans la réponse IA'], 500);
        }

        return $this->json($plans);
    }

    // ══════════════════════════════════════════════════════════════════════
    // EDIT
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/{id}/edit', name: 'admin_abonnement_edit')]
    public function edit(
        Request                $request,
        Abonnement             $abonnement,
        EntityManagerInterface $em
    ): Response {
        $form = $this->createForm(AbonnementType::class, $abonnement);
        $form->remove('frequence');
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', '✅ Abonnement modifié !');
            return $this->redirectToRoute('admin_abonnement_index');
        }

        return $this->render('admin/abonnement/edit.html.twig', [
            'form'       => $form->createView(),
            'abonnement' => $abonnement,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // TOGGLE actif/inactif (AJAX)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/{id}/toggle', name: 'admin_abonnement_toggle', methods: ['POST'])]
    public function toggle(Abonnement $abonnement, EntityManagerInterface $em): JsonResponse
    {
        $abonnement->setActif(!$abonnement->getActif());
        $em->flush();

        $actif = $abonnement->getActif();
        return $this->json([
            'actif'   => $actif,
            'message' => $actif ? '✅ Visible.' : '⏸️ Masqué.',
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // DELETE
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/{id}/delete', name: 'admin_abonnement_delete', methods: ['POST'])]
    public function delete(
        Request                $request,
        Abonnement             $abonnement,
        EntityManagerInterface $em
    ): Response {
        if ($this->isCsrfTokenValid('delete' . $abonnement->getId(), (string) $request->request->get('_token'))) {
            $nom = $abonnement->getNom();
            $em->remove($abonnement);
            $em->flush();
            $this->addFlash('success', '🗑️ "' . $nom . '" supprimé.');
        }

        return $this->redirectToRoute('admin_abonnement_index');
    }

    // ══════════════════════════════════════════════════════════════════════
    // SHOW (détail admin)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/{id}', name: 'admin_abonnement_show')]
    public function show(Abonnement $abonnement, PaiementRepository $paiementRepo): Response
    {
        $id = $abonnement->getId();
        if ($id === null) {
            throw $this->createNotFoundException('Abonnement sans ID.');
        }
        
        /** @var Paiement[] $paiements */
        $paiements = $paiementRepo->findByAbonnementId($id);
        
        $today           = new \DateTime('today');
        $soonLimit       = (new \DateTime('today'))->modify('+30 days');
        $abonnesActifs   = 0;
        $revenus         = 0.0;
        $enAttente       = 0;
        $expirentBientot = 0;

        foreach ($paiements as $p) {
            if (!$p instanceof Paiement) continue;

            if ($p->getStatut() === 'payé') {
                $abonnesActifs++;
                $revenus += (float) $p->getMontant();

                if ($p->getDatePaiement()) {
                    $exp = clone $p->getDatePaiement();
                    if (!$exp instanceof \DateTime) {
                        $exp = new \DateTime($exp->format('Y-m-d H:i:s'));
                    }
                    $frequence = $abonnement->getFrequence();
                    if ($frequence === 'annuel') {
                        $exp->modify('+1 year');
                    } elseif ($frequence === 'trimestriel') {
                        $exp->modify('+3 months');
                    } else {
                        $exp->modify('+1 month');
                    }
                    if ($exp >= $today && $exp <= $soonLimit) {
                        $expirentBientot++;
                    }
                }
            } elseif ($p->getStatut() === 'en_attente') {
                $enAttente++;
            }
        }

        return $this->render('admin/abonnement/show.html.twig', [
            'abonnement'  => $abonnement,
            'paiements'   => $paiements,
            'clientStats' => [
                'abonnesActifs'   => $abonnesActifs,
                'revenus'         => $revenus,
                'enAttente'       => $enAttente,
                'expirentBientot' => $expirentBientot,
            ],
        ]);
    }
}