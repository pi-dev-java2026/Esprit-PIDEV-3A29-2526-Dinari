<?php

namespace App\Form;

use App\Entity\Paiement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class PaiementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ── INFORMATIONS PERSONNELLES ────────────────────────────────
            ->add('nom_client', TextType::class, [
                'label'    => 'Nom complet',
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'Ex: Aymen Sakli',
                    'maxlength'   => 100,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom est obligatoire']),
                    new Length([
                        'min'        => 2,
                        'max'        => 100,
                        'minMessage' => 'Le nom doit contenir au moins 2 caractères',
                        'maxMessage' => 'Le nom ne doit pas dépasser 100 caractères'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le nom ne peut contenir que des lettres, espaces, tirets et apostrophes'
                    ])
                ]
            ])

            ->add('email', EmailType::class, [
                'label'    => 'Adresse email',
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'exemple@email.com',
                    'maxlength'   => 255,
                ],
                'constraints' => [
                    new NotBlank(['message' => 'L\'email est obligatoire']),
                    new Email(['message' => 'Veuillez entrer une adresse email valide'])
                ]
            ])

            // ── MÉTHODE DE PAIEMENT ──────────────────────────────────────
            ->add('methode', ChoiceType::class, [
                'label'   => 'Méthode de paiement',
                'choices' => [
                    'Carte bancaire' => 'carte',
                    'Mobile money'   => 'mobile',
                    'Virement'       => 'virement',
                ],
                'attr'        => ['class' => 'form-control'],
                'constraints' => [new NotBlank(['message' => 'Veuillez choisir une méthode de paiement'])]
            ])

            // ── DÉTAILS CARTE (pour paiement par carte) ──────────────────
            ->add('numero_carte', TextType::class, [
                'label'    => 'Numéro de carte',
                'required' => false,
                'attr'     => [
                    'class'        => 'form-control',
                    'placeholder'  => '4532 1234 5678 9010',
                    'maxlength'    => 19,
                    'inputmode'    => 'numeric',
                    'data-role'    => 'payment-input',
                ],
                'help' => 'Entrez 16 chiffres sans espaces ni tirets'
            ])

            ->add('nom_carte', TextType::class, [
                'label'    => 'Titulaire de la carte',
                'required' => false,
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'Jean Dupont',
                    'maxlength'   => 100,
                ],
                'help' => 'Nom tel qu\'il apparaît sur la carte'
            ])

            ->add('date_expiration', TextType::class, [
                'label'    => 'Date d\'expiration',
                'required' => false,
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'MM/YY',
                    'maxlength'   => 5,
                    'inputmode'   => 'numeric',
                ],
                'help' => 'Format: MM/YY'
            ])

            ->add('cvv', TextType::class, [
                'label'    => 'CVV/CVC',
                'required' => false,
                'attr'     => [
                    'class'      => 'form-control',
                    'placeholder' => '123',
                    'maxlength'  => 4,
                    'inputmode'  => 'numeric',
                ],
                'help' => '3 chiffres au verso de votre carte'
            ])

            // ── MONTANT ──────────────────────────────────────────────────
            ->add('montant', NumberType::class, [
                'label'  => 'Montant à payer (DT)',
                'scale'  => 2,
                'attr'   => [
                    'class'       => 'form-control',
                    'placeholder' => '12.99',
                    'step'        => '0.01',
                    'min'         => '0.01',
                    'readonly'    => true,
                ],
                'help'        => 'Montant auto-calculé',
                'constraints' => [
                    new NotBlank(['message' => 'Le montant est obligatoire']),
                    new Positive(['message' => 'Le montant doit être supérieur à 0'])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paiement::class,
        ]);
    }
}