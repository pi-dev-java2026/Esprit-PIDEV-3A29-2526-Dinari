<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'empty_data' => '',
                'attr' => ['placeholder' => 'nom@exemple.com', 'class' => 'form-input'],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet',
                'empty_data' => '',
                'attr' => ['placeholder' => 'Sujet de la réclamation', 'class' => 'form-input'],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'empty_data' => '',
                'attr' => [
                    'placeholder' => 'Décrivez votre problème en détail...',
                    'class' => 'form-input',
                    'rows' => 4,
                ],
            ])
            ->add('statut', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'En attente' => 'En attente',
                    'En cours' => 'En cours',
                    'Traitée' => 'Traitée',
                    'Rejetée' => 'Rejetée',
                ],
                'attr' => ['class' => 'form-select'],
                'disabled' => !$options['is_admin'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
            'is_admin' => false,
        ]);
    }
}
