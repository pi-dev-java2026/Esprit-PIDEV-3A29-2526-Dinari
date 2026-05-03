<?php

namespace App\Controller;

use App\Repository\AbonnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AbonnementRepository $repo): Response
    {
        return $this->render('home/index.html.twig', [
            'abonnements' => $repo->findActifs(),
        ]);
    }
}