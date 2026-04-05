<?php

namespace App\Form;

use App\Entity\ExpertComptable;
use App\Entity\Offre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', ChoiceType::class, [
    'choices' => [
        'Gestion de budget personnel' => 'budget_personnel',
        'Planification financière' => 'planification_financiere',
        'Suivi des dépenses' => 'suivi_depenses',
        'Audit des dépenses' => 'audit_depenses',
        'Optimisation fiscale' => 'optimisation_fiscale',
        'Conseil en investissement' => 'conseil_investissement',
        'Analyse financière' => 'analyse_financiere',
        'Création de plan financier' => 'plan_financier',
    ],
    'placeholder' => 'Choisir un type d’offre',
])
            ->add('description')
            ->add('prix')
            ->add('duree')
            ->add('expertComptable', EntityType::class, [
                'class' => ExpertComptable::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
