<?php

namespace App\Form;

use App\Entity\ExpertComptable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ExpertComptableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'exemple@gmail.com',
                ],
            ])
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
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de l’expert',
                'required' => false,
                'allow_delete' => true,
                'download_uri' => false,
                'image_uri' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ExpertComptable::class,
        ]);
    }
}