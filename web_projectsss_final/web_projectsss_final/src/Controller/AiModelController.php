<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpClient\HttpClient;

class AiModelController extends AbstractController
{
    #[Route('/admin/ai-model', name: 'admin_ai_model')]
    public function index(): Response
    {
        return $this->render('admin/ai_model/index.html.twig');
    }



    #[Route('/admin/ai-model/retrain', name: 'admin_ai_retrain', methods: ['POST'])]
public function retrain(): Response
{
    $client = HttpClient::create();

    try {
        $response = $client->request(
            'POST',
            'http://127.0.0.1:8001/retrain'
        );

        $data = $response->toArray();

        $this->addFlash('success', '🤖 Model retrained successfully');

    } catch (\Exception $e) {
        $this->addFlash('error', '❌ Retrain failed: ' . $e->getMessage());
    }

    return $this->redirectToRoute('admin_ai_model');
}
}