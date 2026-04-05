<?php

namespace App\Controller\Admin;

use App\Entity\Chapitre;
use App\Entity\Cours;
use App\Form\Admin\AdminChapitreType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/cours/{coursId}/chapitres')]
class AdminChapitreController extends AbstractController
{
    #[Route('', name: 'admin_chapitre_index', methods: ['GET'])]
    public function index(int $coursId, EntityManagerInterface $em): Response
    {
        $cours = $em->getRepository(Cours::class)->find($coursId);
        if (!$cours) { throw $this->createNotFoundException(); }

        return $this->render('admin/chapitre/index.html.twig', [
            'cours'     => $cours,
            'chapitres' => $cours->getChapitres(),
        ]);
    }

    #[Route('/new', name: 'admin_chapitre_new', methods: ['GET', 'POST'])]
    public function new(int $coursId, Request $request, EntityManagerInterface $em): Response
    {
        $cours = $em->getRepository(Cours::class)->find($coursId);
        if (!$cours) { throw $this->createNotFoundException(); }

        $chapitre = new Chapitre();
        $chapitre->setCours($cours);
        $chapitre->setPosition($cours->getChapitres()->count() + 1);

        $form = $this->createForm(AdminChapitreType::class, $chapitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($chapitre);
            $em->flush();
            $this->addFlash('success', 'Chapitre ajouté.');
            return $this->redirectToRoute('admin_chapitre_index', ['coursId' => $coursId]);
        }

        return $this->render('admin/chapitre/form.html.twig', [
            'form'     => $form,
            'cours'    => $cours,
            'chapitre' => $chapitre,
            'mode'     => 'new',
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_chapitre_edit', methods: ['GET', 'POST'])]
    public function edit(int $coursId, int $id, Request $request, EntityManagerInterface $em): Response
    {
        $cours    = $em->getRepository(Cours::class)->find($coursId);
        $chapitre = $em->getRepository(Chapitre::class)->find($id);
        if (!$cours || !$chapitre) { throw $this->createNotFoundException(); }

        $form = $this->createForm(AdminChapitreType::class, $chapitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Chapitre mis à jour.');
            return $this->redirectToRoute('admin_chapitre_index', ['coursId' => $coursId]);
        }

        return $this->render('admin/chapitre/form.html.twig', [
            'form'     => $form,
            'cours'    => $cours,
            'chapitre' => $chapitre,
            'mode'     => 'edit',
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_chapitre_delete', methods: ['POST'])]
    public function delete(int $coursId, int $id, Request $request, EntityManagerInterface $em): Response
    {
        $chapitre = $em->getRepository(Chapitre::class)->find($id);
        if ($chapitre && $this->isCsrfTokenValid('delete_ch_'.$id, $request->request->get('_token'))) {
            $em->remove($chapitre);
            $em->flush();
            $this->addFlash('success', 'Chapitre supprimé.');
        }
        return $this->redirectToRoute('admin_chapitre_index', ['coursId' => $coursId]);
    }
}
