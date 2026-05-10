<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_client', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Jean Dupont',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nom est requis.']),
                    new Assert\Length(['max' => 100]),
                ],
            ])
            ->add('email_client', TextType::class, [
                'label' => 'Votre email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'nom@exemple.com',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new Assert\Email(['message' => 'Email invalide.']),
                ],
            ])
            ->add('note', IntegerType::class, [
                'label' => 'Note (1 à 5)',
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new Assert\Range(['min' => 1, 'max' => 5]),
                ],
            ])
            ->add('commentaire', TextareaType::class, [
                'label' => 'Votre avis',
                'attr' => [
                    'rows' => 5,
                    'placeholder' => 'Partagez votre expérience avec ce service...',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Votre avis est requis.']),
                    new Assert\Length(['min' => 10, 'max' => 1000]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
