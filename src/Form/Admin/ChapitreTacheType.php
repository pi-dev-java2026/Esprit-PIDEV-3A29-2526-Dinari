<?php

namespace App\Form\Admin;

use App\Entity\ChapitreTache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChapitreTacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label'       => 'Titre de la tâche',
                'constraints' => [new NotBlank()],
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Ex : Regarder la vidéo d\'introduction'],
            ])
            ->add('description', TextareaType::class, [
                'label'    => 'Description (optionnel)',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Durée estimée, consigne...'],
            ])
            ->add('position', IntegerType::class, [
                'label' => 'Ordre',
                'attr'  => ['class' => 'form-control', 'min' => 0],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => ChapitreTache::class]);
    }
}
