<?php

namespace App\Controller\Client;

use App\Entity\Avis;
use App\Entity\Paiement;
use App\Form\AvisType;
use App\Repository\AbonnementRepository;
use App\Repository\AvisRepository;
use App\Repository\PromotionRepository;
use App\Service\StripeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    // ══════════════════════════════════════════════════════════════════════
    // INDEX — liste des abonnements
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/abonnement', name: 'app_client_abonnements')]
    public function index(AbonnementRepository $repo, AvisRepository $avisRepo): Response
    {
        return $this->render('client/abonnement/index.html.twig', [
            'abonnements' => $repo->findActifs(),
            'avis' => $avisRepo->findApprovesOrderByDate(6),
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // PLANS PAR SERVICE
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/abonnement/service/{nom}', name: 'app_client_plans_service', methods: ['GET'])]
    public function plansService(
        string               $nom,
        AbonnementRepository $repo
    ): Response {
        $plans = $repo->findPlansByService($nom);

        if (empty($plans)) {
            return $this->redirectToRoute('app_client_abonnements');
        }

        if (count($plans) === 1) {
            return $this->redirectToRoute('app_client_abonnement_show', ['id' => $plans[0]->getId()]);
        }

        $logoDomain = $plans[0]->getLogoDomain();

        return $this->render('client/abonnement/plans_service.html.twig', [
            'plans'      => $plans,
            'nomService' => $nom,
            'logoDomain' => $logoDomain,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // SHOW — détail d'un abonnement + plans du même service
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/abonnement/{id}', name: 'app_client_abonnement_show', methods: ['GET'])]
    public function show(
        int                  $id,
        AbonnementRepository $repo,
        PromotionRepository  $promoRepo,
        Request              $request,
        StripeService        $stripeService
    ): Response {
        $abonnement = $repo->find($id);
        if (!$abonnement) {
            throw $this->createNotFoundException();
        }

        $session = $request->getSession();
        if (!$session->has('client_id')) {
            $session->set('client_id', rand(10000, 99999));
        }
        if (!$session->has('client_email')) {
            $session->set('client_email', 'client_' . $session->get('client_id') . '@temp.dinari.com');
        }
        if (!$session->has('client_nom')) {
            $session->set('client_nom', 'Client');
        }

        $promoId    = $session->get('promo_id');
        $promoPrix  = $session->get('promo_prix');
        $promoLabel = $session->get('promo_label');

        $promoActive = null;
        if ($promoId) {
            $promoActive = $promoRepo->find($promoId);
            if ($promoActive && $promoActive->getAbonnement()?->getId() !== $abonnement->getId()) {
                $promoActive = null;
                $promoPrix   = null;
                $promoLabel  = null;
                $session->remove('promo_id');
                $session->remove('promo_prix');
                $session->remove('promo_label');
            }
        }

        $intent = $stripeService->createPaymentIntent(
            $abonnement,
            $promoPrix ? (float)$promoPrix : null
        );

        $nomParts   = explode(' ', trim($abonnement->getNom()));
        array_pop($nomParts);
        $nomService = implode(' ', $nomParts);

        $autresPlans = [];
        if ($nomService !== '') {
// APRÈS
$autresPlans = $repo->findPlansByService($nomService, (int) $abonnement->getId());        }

        return $this->render('client/abonnement/show.html.twig', [
            'abo'            => $abonnement,
            'errors'         => [],
            'old'            => [],
            'promo_active'   => $promoActive,
            'promo_prix'     => $promoPrix,
            'promo_label'    => $promoLabel,
            'clientSecret'   => $intent->client_secret,
            'publishableKey' => $_ENV['STRIPE_PUBLISHABLE_KEY'],
            'montant'        => $promoPrix ?? $abonnement->getPrixEffectif(),
            'autresPlans'    => $autresPlans,
            'nomService'     => $nomService,
            'mapboxToken'    => $_ENV['MAPBOX_TOKEN'],
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // OFFRE — choix de la promotion
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/abonnement/{id}/offre', name: 'app_client_abonnement_offre', methods: ['GET'])]
    public function offre(
        int                  $id,
        AbonnementRepository $repo,
        PromotionRepository  $promoRepo
    ): Response {
        $abonnement = $repo->find($id);
        if (!$abonnement) {
            throw $this->createNotFoundException('Abonnement introuvable.');
        }

        $promotions = $promoRepo->findActiveByAbonnement($abonnement);

        $logoUrl = null;
        if ($abonnement->getLogoDomain()) {
            $logoUrl = 'https://logo.clearbit.com/' . $abonnement->getLogoDomain();
        }

        return $this->render('client/abonnement/promo_choice.html.twig', [
            'abo'        => $abonnement,
            'promotions' => $promotions,
            'logo_url'   => $logoUrl,
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // VALIDER PROMO
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/abonnement/{id}/offre/valider', name: 'app_client_abonnement_promo_validate', methods: ['POST'])]
    public function validatePromo(
        int                  $id,
        Request              $request,
        AbonnementRepository $repo,
        PromotionRepository  $promoRepo
    ): Response {
        $abonnement = $repo->find($id);
        if (!$abonnement) {
            throw $this->createNotFoundException('Abonnement introuvable.');
        }

        if (!$this->isCsrfTokenValid('promo_' . $id, (string) $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Token invalide.');
        }

        $promoId    = $request->request->get('promo_id');
        $promoVerif = trim((string) $request->request->get('promo_verif', ''));
        $session    = $request->getSession();

        if (empty($promoId)) {
            $session->remove('promo_id');
            $session->remove('promo_prix');
            $session->remove('promo_label');
            return $this->redirectToRoute('app_client_abonnement_show', ['id' => $id]);
        }

        $promo = $promoRepo->find((int)$promoId);
        if (!$promo || $promo->getAbonnement()?->getId() !== $abonnement->getId()) {
            throw $this->createNotFoundException('Promotion introuvable.');
        }

        $error = null;
        $type  = $promo->getType();

        switch ($type) {
            case 'etudiant':
                if (empty($promoVerif)) {
                    $error = 'Veuillez saisir votre email universitaire pour bénéficier de cette offre.';
                } elseif (!filter_var($promoVerif, FILTER_VALIDATE_EMAIL)) {
                    $error = 'Adresse email invalide.';
                } elseif (!preg_match('/\.(edu|ac\.|univ-|etu\.)/i', $promoVerif)) {
                    $error = "L'email saisi ne semble pas appartenir à un domaine universitaire (.edu, .ac.tn…)";
                }
                break;

            case 'famille':
                if (empty($promoVerif)) {
                    $error = 'Veuillez saisir votre adresse email pour bénéficier de cette offre.';
                } elseif (!filter_var($promoVerif, FILTER_VALIDATE_EMAIL)) {
                    $error = 'Adresse email invalide.';
                }
                break;

            case 'fidelite':
            case 'limitee':
                break;

            default:
                $conditions = trim($promo->getConditions() ?? '');
                if (!empty($conditions)) {
                    if (empty($promoVerif)) {
                        $error = "Veuillez renseigner votre email pour valider les conditions d'éligibilité.";
                    } elseif (!filter_var($promoVerif, FILTER_VALIDATE_EMAIL)) {
                        $error = 'Adresse email invalide.';
                    }
                }
                break;
        }

        if ($error !== null) {
            $promotions = $promoRepo->findActiveByAbonnement($abonnement);
            $logoUrl    = $abonnement->getLogoDomain()
                ? 'https://logo.clearbit.com/' . $abonnement->getLogoDomain()
                : null;

            return $this->render('client/abonnement/promo_choice.html.twig', [
                'abo'        => $abonnement,
                'promotions' => $promotions,
                'logo_url'   => $logoUrl,
                'error'      => $error,
            ]);
        }

        $prixReduit = round($abonnement->getPrix() * (1 - $promo->getReductionPct() / 100), 2);
        $session->set('promo_id',    $promo->getId());
        $session->set('promo_prix',  $prixReduit);
        $session->set('promo_label', $promo->getLabel());

        return $this->redirectToRoute('app_client_abonnement_show', ['id' => $id]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // STOCKER LES INFOS CLIENT DANS LA SESSION (appelé avant paiement)
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/paiement/session', name: 'app_client_paiement_session', methods: ['POST'])]
    public function saveClientSession(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $session = $request->getSession();
        
        if (!empty($data['nom'])) {
            $session->set('client_nom', (string) $data['nom']);
        }
        if (!empty($data['prenom'])) {
            $session->set('client_prenom', (string) $data['prenom']);
        }
        if (!empty($data['email'])) {
            $session->set('client_email', (string) $data['email']);
        }
        if (!empty($data['cin'])) {
            $session->set('client_cin', (string) $data['cin']);
        }
        
        return $this->json(['success' => true]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // STRIPE — retour après paiement
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/stripe/return', name: 'app_client_stripe_return', methods: ['GET'])]
    public function stripeReturn(
        Request                $request,
        AbonnementRepository   $aboRepo,
        EntityManagerInterface $em,
        StripeService          $stripeService
    ): Response {
        $intentId = $request->query->get('payment_intent');
        $status   = $request->query->get('redirect_status');

        if (!$intentId || $status !== 'succeeded') {
            $this->addFlash('error', '❌ Paiement échoué ou annulé.');
            return $this->redirectToRoute('app_client_abonnements');
        }

        $intent = $stripeService->retrievePaymentIntent((string) $intentId);

        if ($intent->status !== 'succeeded') {
            $this->addFlash('error', '❌ Paiement non confirmé par Stripe.');
            return $this->redirectToRoute('app_client_abonnements');
        }

        $existant = $em->getRepository(Paiement::class)
            ->findOneBy(['stripe_transaction_id' => $intentId]);

        if ($existant) {
            return $this->redirectToRoute('app_client_paiement_confirmation', [
                'id' => $existant->getId(),
            ]);
        }

        $aboId      = $intent->metadata['abonnement_id'] ?? null;
        $abonnement = $aboRepo->find((int)$aboId);

        if (!$abonnement) {
            $this->addFlash('error', '❌ Abonnement introuvable.');
            return $this->redirectToRoute('app_client_abonnements');
        }

        $session = $request->getSession();
        $clientId    = (int)($session->get('client_id', rand(10000, 99999)));
        $clientEmail = (string)($session->get('client_email', 'client_' . $clientId . '@temp.dinari.com'));
        $clientNom   = (string)($session->get('client_nom', 'Client'));

        $paiement = new Paiement();
        $paiement->setAbonnementId($abonnement)
                 ->setMontant((string)($intent->amount_received / 100))
                 ->setStatut('payé')
                 ->setDatePaiement(new \DateTime())
                 ->setModePaiement('Stripe')
                 ->setStripeTransactionId($intent->id);

        $em->persist($paiement);
        $em->flush();

        $session->remove('promo_id');
        $session->remove('promo_prix');
        $session->remove('promo_label');

        return $this->redirectToRoute('app_client_paiement_confirmation', [
            'id' => $paiement->getId(),
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // CONFIRMATION de paiement
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/paiement/{id}/confirmation', name: 'app_client_paiement_confirmation', methods: ['GET', 'POST'])]
    public function confirmation(
        int                    $id,
        Request                $request,
        EntityManagerInterface $em,
        AbonnementRepository   $aboRepo
    ): Response {
        $paiement = $em->getRepository(Paiement::class)->find($id);
        if (!$paiement) {
            throw $this->createNotFoundException('Paiement introuvable.');
        }

        $dateDebut = clone $paiement->getDatePaiement();
        $frequence = $paiement->getAbonnementId()?->getFrequence() ?? 'mensuel';
        $dateFin   = clone $dateDebut;

        // S'assurer que $dateFin est un objet DateTime
        if ($dateFin instanceof \DateTime) {
            if (str_contains($frequence, 'annuel')) {
                $dateFin->modify('+1 year');
            } elseif (str_contains($frequence, 'tri')) {
                $dateFin->modify('+3 months');
            } else {
                $dateFin->modify('+1 month');
            }
        }

        $autresOffres = array_values(array_filter(
            $aboRepo->findActifs(),
            fn($a) => $a->getId() !== $paiement->getAbonnementId()?->getId()
        ));
        $suggestions = array_slice($autresOffres, 0, 3);

        $avis = new Avis();
        $avis->setPaiement($paiement);
        $avis->setAbonnement($paiement->getAbonnementId());

        $couleurs = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E2'];
        $avis->setCouleurAvatar($couleurs[array_rand($couleurs)]);

        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($avis);
            $em->flush();

            $this->addFlash('success', '✅ Merci pour votre avis ! Il sera publié après modération.');
            return $this->redirectToRoute('app_client_abonnements');
        }

        return $this->render('client/abonnement/confirmation.html.twig', [
            'paiement'    => $paiement,
            'dateFin'     => $dateFin,
            'suggestions' => $suggestions,
            'form'        => $form->createView(),
        ]);
    }

    // ══════════════════════════════════════════════════════════════════════
    // ANNULER un paiement
    // ══════════════════════════════════════════════════════════════════════
    #[Route('/client/paiement/{id}/annuler', name: 'app_client_paiement_annuler', methods: ['POST'])]
    public function annuler(int $id, EntityManagerInterface $em): Response
    {
        $paiement = $em->getRepository(Paiement::class)->find($id);
        if (!$paiement) {
            throw $this->createNotFoundException('Paiement introuvable.');
        }

        $paiement->setStatut('remboursé');
        $em->flush();

        return $this->redirectToRoute('app_client_abonnements');
    }
}