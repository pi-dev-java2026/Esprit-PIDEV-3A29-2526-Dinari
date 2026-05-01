<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

/**
 * @extends AbstractCrudController<Cours>
 */
class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('nomCours', 'Titre');
        yield TextareaField::new('description', 'Description')->hideOnIndex();
        yield ChoiceField::new('niveau', 'Niveau')->setChoices([
            'Débutant'      => 'debutant',
            'Intermédiaire' => 'intermediaire',
            'Avancé'        => 'avance',
        ])->allowMultipleChoices(false);
        yield TextField::new('theme', 'Thèmes (mots-clés)')->hideOnIndex();
        yield DateField::new('dateCreation', 'Date de création');
    }
}
