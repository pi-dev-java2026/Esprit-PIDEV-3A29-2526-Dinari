<?php

namespace App\Service;

use App\Entity\Abonnement;
use Stripe\StripeClient;

class StripeService
{
    private StripeClient $stripe;

    public function __construct(string $secretKey)
    {
        $this->stripe = new StripeClient($secretKey);
    }

    /**
     * Crée un PaymentIntent Stripe pour l'abonnement
     * 
     * @return \Stripe\PaymentIntent
     */
    public function createPaymentIntent(Abonnement $abonnement, ?float $montantPromo = null): \Stripe\PaymentIntent
    {
        $montant = $montantPromo ?? (float) $abonnement->getPrixEffectif();

        /** @var array<string, mixed> $metadata */
        $metadata = [
            'abonnement_id' => (string) $abonnement->getId(),
            'abonnement_nom' => $abonnement->getNom(),
        ];

        return $this->stripe->paymentIntents->create([
            'amount' => (int) round($montant * 100),
            'currency' => 'eur',
            'automatic_payment_methods' => ['enabled' => true],
            'metadata' => $metadata,
            'description' => 'Abonnement ' . $abonnement->getNom() . ' — Dinari',
        ]);
    }

    /**
     * Récupère un PaymentIntent Stripe par son ID
     * 
     * @return \Stripe\PaymentIntent
     */
    public function retrievePaymentIntent(string $intentId): \Stripe\PaymentIntent
    {
        return $this->stripe->paymentIntents->retrieve($intentId);
    }
}