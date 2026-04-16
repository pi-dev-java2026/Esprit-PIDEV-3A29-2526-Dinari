<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Chapitre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChapitreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chapitre::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield IntegerField::new('position', 'Position');
        yield TextField::new('titre', 'Titre');
        yield TextField::new('sousTitre', 'Sous-titre')->hideOnIndex();
        yield TextareaField::new('intro', 'Introduction')->hideOnIndex();
        yield TextareaField::new('contenuPrincipal', 'Contenu principal')->hideOnIndex();
        yield AssociationField::new('cours', 'Cours');
    }
}
