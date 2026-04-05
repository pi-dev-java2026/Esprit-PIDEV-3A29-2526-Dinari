<?php

namespace App\Form\Admin;

use App\Entity\Cours;
use App\Entity\Quiz;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class AdminQuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label'       => 'Titre du quiz',
                'empty_data'  => '',
                'constraints' => [new NotBlank(message: 'Le titre est obligatoire.')],
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Ex : Quiz — Budget personnel'],
            ])
            ->add('cours', EntityType::class, [
                'class'        => Cours::class,
                'choice_label' => 'nomCours',
                'label'        => 'Cours associé',
                'required'     => false,
                'placeholder'  => '— Aucun cours —',
                'attr'         => ['class' => 'form-control'],
            ])
            ->add('listeReponse', TextareaType::class, [
                'label'       => 'Choix de réponses (une par ligne)',
                'empty_data'  => '',
                'constraints' => [new NotBlank(message: 'Les choix de réponses sont obligatoires.')],
                'attr'        => ['class' => 'form-control', 'rows' => 4, 'placeholder' => "Réponse A\nRéponse B\nRéponse C"],
            ])
            ->add('reponseCorrect', TextType::class, [
                'label'       => 'Réponse correcte',
                'empty_data'  => '',
                'constraints' => [new NotBlank(message: 'La réponse correcte est obligatoire.')],
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Ex : Réponse A'],
            ])
            ->add('scoreQuiz', IntegerType::class, [
                'label'       => 'Score',
                'required'    => false,
                'constraints' => [new Positive(message: 'Le score doit être un nombre positif.')],
                'attr'        => ['class' => 'form-control', 'min' => 1],
            ])
            ->add('timeLimit', IntegerType::class, [
                'label'       => 'Limite de temps (secondes)',
                'required'    => false,
                'constraints' => [new Positive(message: 'La limite de temps doit être un nombre positif.')],
                'attr'        => ['class' => 'form-control', 'min' => 1],
            ])
            ->add('isExamMode', CheckboxType::class, [
                'label'    => 'Mode examen',
                'required' => false,
                'attr'     => ['class' => 'form-check-input'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Quiz::class]);
    }
}
