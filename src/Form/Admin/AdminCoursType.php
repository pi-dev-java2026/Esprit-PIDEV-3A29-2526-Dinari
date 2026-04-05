<?php

namespace App\Form\Admin;

use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdminCoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCours', TextType::class, [
                'label' => 'Titre du cours',
                'constraints' => [new NotBlank()],
                'attr' => ['class' => 'form-control', 'placeholder' => 'Ex : Finance personnelle'],
            ])
            ->add('description', TextareaType::class, [
                'label'    => 'Description',
                'required' => false,
                'attr'     => [
                    'class'       => 'form-control',
                    'rows'        => 3,
                    'placeholder' => 'Courte description du cours (pas d\'URL)',
                ],
            ])
            ->add('contenu', TextType::class, [
                'label'    => 'Identifiant / Slug',
                'required' => false,
                'attr'     => [
                    'class'       => 'form-control',
                    'placeholder' => 'Ex : finance-personnelle',
                    'pattern'     => '^(?!https?://).*',
                    'title'       => 'Entrez un identifiant court (ex: finance-personnelle), pas une URL',
                ],
            ])
            ->add('dateCreation', DateType::class, [
                'label' => 'Date de création',
                'widget' => 'single_text',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Cours::class]);
    }
}
