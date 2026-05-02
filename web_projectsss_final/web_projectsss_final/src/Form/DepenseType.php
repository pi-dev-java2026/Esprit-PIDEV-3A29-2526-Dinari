<?php
namespace App\Form;

use App\Entity\Depense;
use App\Entity\ModePaiement;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant', NumberType::class, [
                'label' => 'Montant',
            ])
            ->add('dateDepense', DateType::class, [
                'widget' => 'single_text',
                'label'  => 'Date de dépense',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
            ])
            ->add('modePaiement', EntityType::class, [
                'class'        => ModePaiement::class,
                'choice_label' => 'label',
                'label'        => 'Mode de paiement',
            ])
            ->add('categorie', EntityType::class, [
                'class'        => Categorie::class,
                'choice_label' => 'label',
                'label'        => 'Catégorie',
            ]);
        // utilisateurId est géré automatiquement en arrière-plan (session/controller)
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Depense::class,
        ]);
    }
}
