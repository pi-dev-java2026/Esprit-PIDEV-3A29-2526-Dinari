<?php

namespace App\Form;

use App\Entity\JustificatifDepense;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class JustificatifDepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'mapped' => false,   // IMPORTANT
                'required' => true,
               
    'attr' => [
        'id' => 'fichier-input'
    ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JustificatifDepense::class,
        ]);
    }
}