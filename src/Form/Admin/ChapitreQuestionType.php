<?php

namespace App\Form\Admin;

use App\Entity\ChapitreQuestion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChapitreQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question', TextareaType::class, [
                'label'       => 'Question',
                'constraints' => [new NotBlank()],
                'attr'        => ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Énoncé de la question'],
            ])
            ->add('choixA', TextType::class, [
                'label'       => 'Choix A',
                'constraints' => [new NotBlank()],
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Réponse A'],
            ])
            ->add('choixB', TextType::class, [
                'label'       => 'Choix B',
                'constraints' => [new NotBlank()],
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Réponse B'],
            ])
            ->add('choixC', TextType::class, [
                'label'    => 'Choix C',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'placeholder' => 'Réponse C (optionnel)'],
            ])
            ->add('choixD', TextType::class, [
                'label'    => 'Choix D',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'placeholder' => 'Réponse D (optionnel)'],
            ])
            ->add('bonneReponse', ChoiceType::class, [
                'label'   => 'Bonne réponse',
                'choices' => ['A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd'],
                'attr'    => ['class' => 'form-control'],
            ])
            ->add('position', IntegerType::class, [
                'label' => 'Ordre',
                'attr'  => ['class' => 'form-control', 'min' => 0],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => ChapitreQuestion::class]);
    }
}
