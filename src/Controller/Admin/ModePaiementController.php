<?php

namespace App\Controller\Admin;

use App\Entity\ModePaiement;
use App\Form\ModePaiementType;
use App\Repository\ModePaiementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/mode-paiement', name: 'admin_mode_paiement_')]
class ModePaiementController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(ModePaiementRepository $repo): Response
    {
        $modes = $repo->findAllOrderedByLabel();

        $data = [];
        foreach ($modes as $mode) {
            $data[] = [
                'mode'       => $mode,
                'nbDepenses' => $repo->countDepenses($mode->getId()),
            ];
        }

        return $this->render('admin/mode_paiement/index.html.twig', [
            'data' => $data,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, ModePaiementRepository $repo): Response
    {
        $mode = new ModePaiement();
        $form = $this->createForm(ModePaiementType::class, $mode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($repo->labelExiste($mode->getLabel())) {
                $this->addFlash('error', 'Ce mode de paiement existe déjà.');
                return $this->redirectToRoute('admin_mode_paiement_new');
            }

            $em->persist($mode);
            $em->flush();

            $this->addFlash('success', 'Mode de paiement créé.');
            return $this->redirectToRoute('admin_mode_paiement_index');
        }

        return $this->render('admin/mode_paiement/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModePaiement $mode, EntityManagerInterface $em, ModePaiementRepository $repo): Response
    {
        $form = $this->createForm(ModePaiementType::class, $mode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($repo->labelExiste($mode->getLabel(), $mode->getId())) {
                $this->addFlash('error', 'Ce mode de paiement existe déjà.');
                return $this->redirectToRoute('admin_mode_paiement_edit', [
                    'id' => $mode->getId()
                ]);
            }

            $em->flush();

            $this->addFlash('success', 'Mode de paiement modifié.');
            return $this->redirectToRoute('admin_mode_paiement_index');
        }

        return $this->render('admin/mode_paiement/edit.html.twig', [
            'form' => $form->createView(),
            'mode' => $mode
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, ModePaiement $mode, EntityManagerInterface $em, ModePaiementRepository $repo): Response
    {
        if ($this->isCsrfTokenValid('delete_mode' . $mode->getId(), $request->request->get('_token'))) {

            if ($repo->countDepenses($mode->getId()) > 0) {
                $this->addFlash('error', 'Impossible de supprimer : mode utilisé.');
                return $this->redirectToRoute('admin_mode_paiement_index');
            }

            $em->remove($mode);
            $em->flush();

            $this->addFlash('success', 'Mode supprimé.');
        }

        return $this->redirectToRoute('admin_mode_paiement_index');
    }
}