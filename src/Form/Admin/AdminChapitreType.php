<?php

namespace App\Form\Admin;

use App\Entity\Chapitre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdminChapitreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ── Identité ──
            ->add('position', IntegerType::class, [
                'label'      => 'Ordre (position)',
                'attr'       => ['class' => 'form-control', 'min' => 0],
                'empty_data' => 0,
            ])
            ->add('titre', TextType::class, [
                'label'       => 'Titre du chapitre',
                'constraints' => [new NotBlank(message: 'Le titre est obligatoire.')],
                'empty_data'  => '',
                'attr'        => ['class' => 'form-control', 'placeholder' => 'Ex : Budget Personnel'],
            ])
            ->add('sousTitre', TextType::class, [
                'label'    => 'Sous-titre',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'placeholder' => 'Ex : Créer et suivre son budget'],
            ])
            // ── Contenu ──
            ->add('intro', TextareaType::class, [
                'label'    => 'Introduction',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'rows' => 3,
                               'placeholder' => 'Phrase d\'accroche affichée dans le bandeau bleu du chapitre'],
            ])
            ->add('contenuPrincipal', TextareaType::class, [
                'label'    => 'Contenu principal',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'rows' => 8,
                               'placeholder' => 'Explication détaillée du chapitre...'],
            ])
            ->add('aRetenir', TextareaType::class, [
                'label'    => '💡 À retenir',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'rows' => 3,
                               'placeholder' => 'Note mise en avant dans l\'encadré bleu'],
            ])
            // ── Vidéo ──
            ->add('videoUrl', UrlType::class, [
                'label'            => 'URL de la vidéo (YouTube embed)',
                'required'         => false,
                'default_protocol' => 'https',
                'attr'             => ['class' => 'form-control',
                                       'placeholder' => 'https://www.youtube.com/embed/...'],
            ])
            // ── Image ──
            ->add('imageUrl', UrlType::class, [
                'label'            => 'URL de l\'image',
                'required'         => false,
                'default_protocol' => 'https',
                'attr'             => ['class' => 'form-control',
                                       'placeholder' => 'https://images.unsplash.com/...'],
            ])
            ->add('imageTitre', TextType::class, [
                'label'    => 'Titre de l\'image',
                'required' => false,
                'attr'     => ['class' => 'form-control', 'placeholder' => 'Ex : Le cycle financier'],
            ])
            ->add('imageDescription', TextType::class, [
                'label'    => 'Description / légende de l\'image',
                'required' => false,
                'attr'     => ['class' => 'form-control',
                               'placeholder' => 'Ex : Revenus → Dépenses → Épargne → Investissement'],
            ])
            // ── Tâches ──
            ->add('taches', CollectionType::class, [
                'label'        => false,
                'entry_type'   => ChapitreTacheType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype'    => true,
            ])
            // ── Questions QCM ──
            ->add('questions', CollectionType::class, [
                'label'        => false,
                'entry_type'   => ChapitreQuestionType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype'    => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Chapitre::class]);
    }
}
