<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Quiz;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

/**
 * @extends AbstractCrudController<Quiz>
 */
class QuizCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quiz::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('titre', 'Titre');
        yield TextareaField::new('listeReponse', 'Choix de réponses')->hideOnIndex();
        yield TextField::new('reponseCorrect', 'Réponse correcte')->hideOnIndex();
        yield IntegerField::new('scoreQuiz', 'Score');
        yield TextField::new('theme', 'Thèmes');
        yield BooleanField::new('isExamMode', 'Mode examen');
        yield IntegerField::new('timeLimit', 'Limite de temps (s)')->hideOnIndex();
        yield AssociationField::new('cours', 'Cours associé');
        yield DateField::new('dateCreation', 'Date de création');
    }
}
