<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use App\Form\Admin\AdminCoursType;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/cours')]
class AdminCoursController extends AbstractController
{
    #[Route('', name: 'admin_cours_index', methods: ['GET'])]
    public function index(CoursRepository $repo): Response
    {
        return $this->render('admin/cours/index.html.twig', [
            'cours_list' => $repo->findAllWithTree(),
        ]);
    }

    private function sanitizeCours(Cours $cours): void
    {
        // Never store a URL in contenu (slug) or description
        if ($cours->getContenu() && str_starts_with($cours->getContenu(), 'http')) {
            $cours->setContenu(null);
        }
        if ($cours->getDescription() && str_starts_with($cours->getDescription(), 'http')) {
            $cours->setDescription(null);
        }
    }

    #[Route('/new', name: 'admin_cours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $cours = new Cours();
        $cours->setDateCreation(new \DateTime());
        $form = $this->createForm(AdminCoursType::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->sanitizeCours($cours);
            $em->persist($cours);
            $em->flush();
            $this->addFlash('success', 'Cours créé avec succès.');
            return $this->redirectToRoute('admin_cours_index');
        }

        return $this->render('admin/cours/form.html.twig', [
            'form'  => $form,
            'cours' => $cours,
            'mode'  => 'new',
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_cours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cours $cours, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AdminCoursType::class, $cours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->sanitizeCours($cours);
            $em->flush();
            $this->addFlash('success', 'Cours mis à jour.');
            return $this->redirectToRoute('admin_cours_index');
        }

        return $this->render('admin/cours/form.html.twig', [
            'form'  => $form,
            'cours' => $cours,
            'mode'  => 'edit',
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_cours_delete', methods: ['POST'])]
    public function delete(Request $request, Cours $cours, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_cours_'.$cours->getId(), $request->request->get('_token'))) {
            $em->remove($cours);
            $em->flush();
            $this->addFlash('success', 'Cours supprimé.');
        }
        return $this->redirectToRoute('admin_cours_index');
    }
}
