<?php

namespace App\Controller\Client;

use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CoursRepository $coursRepo): Response
    {
        return $this->render('client/home/index.html.twig', [
            'cours_list' => $coursRepo->findBy([], ['id' => 'DESC'], 3),
        ]);
    }
}
