<?php

namespace App\Form;

use App\Entity\ExpertComptable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ExpertComptableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('specialite', ChoiceType::class, [
            'choices' => [
            'Comptabilité générale' => 'comptabilite_generale',
            'Fiscalité' => 'fiscalite',
            'Audit' => 'audit',
            'Gestion financière' => 'gestion_financiere',
            'Conseil juridique' => 'conseil_juridique',
            
            ],
            'placeholder' => 'Choisir une spécialité',
        ])
            ->add('experience')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExpertComptable::class,
        ]);
    }
}
