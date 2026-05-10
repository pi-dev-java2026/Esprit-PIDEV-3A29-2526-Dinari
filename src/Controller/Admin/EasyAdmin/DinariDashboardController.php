<?php

namespace App\Controller\Admin\EasyAdmin;

use App\Entity\Chapitre;
use App\Entity\Commentaire;
use App\Entity\Cours;
use App\Entity\Notification;
use App\Entity\Quiz;
use App\Entity\QuizResultat;
use App\Repository\CoursRepository;
use App\Repository\QuizRepository;
use App\Repository\QuizResultatRepository;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[AdminDashboard(routePath: '/easyadmin', routeName: 'easyadmin')]
class DinariDashboardController extends AbstractDashboardController
{
    public function __construct(
        private readonly CoursRepository        $coursRepo,
        private readonly QuizRepository         $quizRepo,
        private readonly QuizResultatRepository $resultatRepo,
    ) {}

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<strong>Dinari</strong> Admin')
            ->setFaviconPath('img/logo.png')
            ->renderContentMaximized();
    }

    #[Route('/easyadmin', name: 'easyadmin')]
    public function index(): Response
    {
        $nbCours    = $this->coursRepo->count([]);
        $nbQuizzes  = $this->quizRepo->count([]);
        $nbAttempts = $this->resultatRepo->countAll();
        $avgScore   = $this->resultatRepo->getGlobalAverageScore();
        $weakTopics = $this->resultatRepo->findGlobalWeakTopics();

        return $this->render('admin/easyadmin/dashboard.html.twig', [
            'nb_cours'    => $nbCours,
            'nb_quizzes'  => $nbQuizzes,
            'nb_attempts' => $nbAttempts,
            'avg_score'   => $avgScore,
            'weak_topics' => array_slice($weakTopics, 0, 5),
        ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Contenu');
        yield MenuItem::linkToCrud('Cours', 'fa fa-book', Cours::class);
        yield MenuItem::linkToCrud('Quiz', 'fa fa-question-circle', Quiz::class);
        yield MenuItem::linkToCrud('Chapitres', 'fa fa-list', Chapitre::class);
        yield MenuItem::section('Activité');
        yield MenuItem::linkToCrud('Résultats Quiz', 'fa fa-chart-bar', QuizResultat::class);
        yield MenuItem::linkToCrud('Commentaires', 'fa fa-comments', Commentaire::class);
        yield MenuItem::linkToCrud('Notifications', 'fa fa-bell', Notification::class);
        yield MenuItem::section('Navigation');
        yield MenuItem::linkToRoute('Statistiques avancées', 'fa fa-chart-line', 'admin_statistiques');
        yield MenuItem::linkToRoute('Site public', 'fa fa-globe', 'app_home');
    }
}
