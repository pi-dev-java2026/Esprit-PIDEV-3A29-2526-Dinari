<?php

namespace App\Form;

use App\Entity\Abonnement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextareaType::class, [
                'label'       => 'Description',
                'required'    => false,
                'attr'        => ['class' => 'form-control', 'rows' => 3, 'maxlength' => 600],
                'constraints' => [new Length(['max' => 600])],
            ])
            ->add('prix_marche', NumberType::class, [
                'label'       => 'Prix marché (DT)',
                'required'    => false,
                'scale'       => 2,
                'attr'        => ['class' => 'form-control', 'readonly' => true],
                'constraints' => [new GreaterThanOrEqual(['value' => 0])],
            ])
            ->add('prix', NumberType::class, [
                'label'           => 'Prix Dinari (DT)',
                'required'        => true,
                'scale'           => 2,
                'attr'            => [
                    'class'       => 'form-control',
                    'placeholder' => 'ex: 7.99',
                    'step'        => '0.01',
                    'min'         => '0.01',
                    'id'          => 'prix-dinari',
                ],
                'invalid_message' => 'Veuillez saisir un prix valide (ex: 7.99)',
                'constraints'     => [
                    new NotBlank(['message' => 'Le prix Dinari est obligatoire']),
                    new NotNull(['message'  => 'Le prix Dinari est obligatoire']),
                    new Positive(['message' => 'Le prix doit être supérieur à 0']),
                ],
            ])
            ->add('essai_gratuit', IntegerType::class, [
                'label'       => "Période d'essai (jours)",
                'required'    => false,
                'data'        => 0,
                'attr'        => ['class' => 'form-control', 'min' => 0, 'max' => 365, 'id' => 'essai-gratuit'],
                'constraints' => [
                    new GreaterThanOrEqual(['value' => 0]),
                    new LessThanOrEqual(['value'    => 365]),
                ],
            ])
            ->add('badge', TextType::class, [
                'label'       => 'Badge',
                'required'    => false,
                'attr'        => ['id' => 'badge-hidden', 'maxlength' => 50],
                'constraints' => [new Length(['max' => 50])],
            ])
            ->add('date_fin_offre', DateType::class, [
                'label'    => "Expiration de l'offre",
                'widget'   => 'single_text',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'id' => 'date-fin-offre'],
            ])
            ->add('actif', CheckboxType::class, [
                'label'    => 'Actif (visible aux clients)',
                'required' => false,
                'data'     => true,
            ])
            ->add('mis_en_avant', CheckboxType::class, [
                'label'    => "Mis en avant (page d'accueil)",
                'required' => false,
            ])
            ->add('promotions', CollectionType::class, [
                'label'         => false,
                'entry_type'    => PromotionType::class,
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
                'prototype'     => true,
                'required'      => false,
                'entry_options' => ['label' => false],
            ])
        ;

        // ── Validation métier + génération description ────────────────────
        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            $abo       = $event->getData();
            $form      = $event->getForm();
            $prix      = (float) $abo->getPrix();
            $prixMarche = (float) ($abo->getPrixMarche() ?? 0);

            // Règle : prix Dinari doit être strictement inférieur au prix marché
            if ($prix > 0 && $prixMarche > 0 && $prix >= $prixMarche) {
                $form->get('prix')->addError(new FormError(
                    sprintf('Le prix Dinari (%.2f DT) doit être inférieur au prix marché (%.2f DT)', $prix, $prixMarche)
                ));
            }

            // Règle : date fin d'offre doit être dans le futur
            $dateFin = $abo->getDateFinOffre();
            if ($dateFin !== null && $dateFin <= new \DateTime('today')) {
                $form->get('date_fin_offre')->addError(new FormError(
                    "La date d'expiration de l'offre doit être dans le futur"
                ));
            }

            // Génération automatique de la description si vide
            if ($prix > 0 && empty(trim($abo->getDescription() ?? ''))) {
                $freq      = $abo->getFrequence() ?? 'mensuel';
                $nom       = $abo->getNom() ?? 'ce service';
                $freqLabel = match ($freq) {
                    'annuel'       => 'par an',
                    'trimestriel'  => 'par trimestre',
                    default        => 'par mois',
                };
                $niveau = match (true) {
                    $prix <= 5  => ['l' => 'essentiel',      'e' => '🌱'],
                    $prix <= 10 => ['l' => 'standard',       'e' => '⚡'],
                    $prix <= 20 => ['l' => 'premium',        'e' => '🚀'],
                    $prix <= 40 => ['l' => 'professionnel',  'e' => '💼'],
                    default     => ['l' => 'complet',        'e' => '💎'],
                };
                $tierBonus = match ($abo->getTier() ?? 'Normal') {
                    'Gold'     => ' — Accès Gold prioritaire.',
                    'Platinum' => ' — Avantages Platinum exclusifs.',
                    'Silver'   => ' — Niveau Silver avancé.',
                    default    => '.',
                };
                $saving = ($prixMarche > $prix && $prixMarche > 0)
                    ? sprintf(' Économisez %d%% vs marché.', round(($prixMarche - $prix) / $prixMarche * 100))
                    : '';

                $abo->setDescription(sprintf(
                    '%s Accès %s à %s pour %.2f DT %s. Toutes fonctionnalités incluses%s%s',
                    $niveau['e'], $niveau['l'], $nom, $prix, $freqLabel, $tierBonus, $saving
                ));
            }

            $event->setData($abo);
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Abonnement::class]);
    }
}