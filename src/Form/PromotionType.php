<?php

namespace App\Form;

use App\Entity\Promotion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label'   => 'Type de promotion',
                'choices' => [
                    'Tarif étudiant' => 'etudiant',
                    'Pack familial'  => 'famille',
                    'Fidélité'       => 'fidelite',
                    'Offre limitée'  => 'limitee',
                ],
                'attr'        => ['class' => 'form-control'],
                'constraints' => [new NotBlank(['message' => 'Choisissez un type de promotion'])]
            ])
            ->add('reduction_pct', IntegerType::class, [
                'label' => 'Réduction (%)',
                'attr'  => [
                    'class'       => 'form-control',
                    'min'         => 1,
                    'max'         => 90,
                    'placeholder' => 'Ex: 30',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'La réduction est obligatoire']),
                    new Range([
                        'min'              => 1,
                        'max'              => 90,
                        'notInRangeMessage' => 'La réduction doit être entre 1% et 90%'
                    ])
                ]
            ])
            ->add('conditions', TextareaType::class, [
                'label'    => 'Conditions (optionnel)',
                'required' => false,
                'attr'     => [
                    'class'       => 'form-control',
                    'rows'        => 2,
                    'placeholder' => 'Ex: Nécessite un email .edu ou carte étudiante',
                    'maxlength'   => 300,
                ],
                'constraints' => [
                    new Length(['max' => 300, 'maxMessage' => 'Les conditions ne doivent pas dépasser 300 caractères'])
                ]
            ])
            ->add('date_debut', DateType::class, [
                'label'    => 'Date de début',
                'widget'   => 'single_text',
                'required' => false,
                'attr'     => ['class' => 'form-control']
            ])
            ->add('date_fin', DateType::class, [
                'label'    => 'Date de fin',
                'widget'   => 'single_text',
                'required' => false,
                'attr'     => ['class' => 'form-control']
            ])
        ;

        // Auto-génère le label selon type + réduction AVANT soumission
        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            /** @var Promotion $promo */
            $promo = $event->getData();

            $labels = [
                'etudiant' => fn(int $pct) => "Tarif étudiant -{$pct}%",
                'famille'  => fn(int $pct) => "Pack familial -{$pct}%",
                'fidelite' => fn(int $pct) => "Offre fidélité -{$pct}%",
                'limitee'  => fn(int $pct) => "Offre limitée -{$pct}%",
            ];

            $type = $promo->getType() ?? 'limitee';
            $pct  = (int) ($promo->getReductionPct() ?? 0);

            if (isset($labels[$type]) && $pct > 0) {
                $promo->setLabel($labels[$type]($pct));
            }

            $event->setData($promo);
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}