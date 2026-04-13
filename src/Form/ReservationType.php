<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomClient')
            ->add('prenomClient')
            ->add('emailClient', EmailType::class, [
                'attr' => [
                    'placeholder' => 'exemple@gmail.com',
                ],
            ])
            ->add('telephoneClient')
            ->add('message', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Ajoutez un message si nécessaire...',
                    'rows' => 5,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}