<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\QuizResultat;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

/**
 * @extends AbstractCrudController<QuizResultat>
 */
class QuizResultatCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QuizResultat::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        // Read-only: no create/edit
        return $actions
            ->disable(Action::NEW, Action::EDIT);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('sessionId', 'Session');
        yield AssociationField::new('quiz', 'Quiz');
        yield IntegerField::new('scoreObtenu', 'Score obtenu');
        yield IntegerField::new('scoreMax', 'Score max');
        yield NumberField::new('scorePourcentage', 'Pourcentage')->hideOnForm();
        yield TextField::new('niveauUtilisateur', 'Niveau');
        yield DateTimeField::new('datePassage', 'Date');
    }
}
