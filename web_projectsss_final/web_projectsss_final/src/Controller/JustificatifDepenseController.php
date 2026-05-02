<?php

namespace App\Controller;

use App\Form\JustificatifDepenseType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use App\Entity\Depense;
use App\Entity\JustificatifDepense;
use App\Repository\JustificatifDepenseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/justificatif')]
class JustificatifDepenseController extends AbstractController
{
    // ── LISTE ─────────────────────────────────────────────
    #[Route('/depense/{id}', name: 'justificatif_list', methods: ['GET'])]
    public function list(Depense $depense, JustificatifDepenseRepository $repo): Response
    {
        $justificatifs = $repo->findByDepense($depense->getId());

        return $this->render('justificatif/list.html.twig', [
            'depense' => $depense,
            'justificatifs' => $justificatifs,
        ]);
    }

    // ── CREATE ─────────────────────────────────────────────
    #[Route('/depense/{id}/new', name: 'justificatif_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Depense $depense, EntityManagerInterface $em): Response
    {
        $justif = new JustificatifDepense();

        $form = $this->createForm(JustificatifDepenseType::class, $justif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('file')->getData();

            if ($file) {

                $extension = strtolower($file->guessExtension());
                $allowed = ['pdf', 'png', 'jpg', 'jpeg'];

                if (!in_array($extension, $allowed)) {
                    $this->addFlash('error', 'Format non autorisé.');
                    return $this->redirectToRoute('justificatif_new', [
                        'id' => $depense->getId()
                    ]);
                }

                $filename = uniqid('justif_') . '.' . $extension;

                try {
                    $file->move(
                        $this->getParameter('uploads_dir'),
                        $filename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur upload fichier.');
                }

                $justif->setFilepath('uploads/' . $filename);
                $justif->setTypefichier($extension);
                $justif->setDateajout(new \DateTime());
                $justif->setDepense($depense);

                $em->persist($justif);
                $em->flush();

                $this->addFlash('success', 'Justificatif ajouté avec succès.');

                return $this->redirectToRoute('justificatif_list', [
                    'id' => $depense->getId()
                ]);
            }
        }

        return $this->render('justificatif/new.html.twig', [
            'form' => $form->createView(),
            'depense' => $depense
        ]);
    }

    // ── EDIT ───────────────────────────────────────────────
    #[Route('/{id}/edit', name: 'justificatif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JustificatifDepense $justificatif, EntityManagerInterface $em): Response
    {
        $depense = $justificatif->getDepense();

        $form = $this->createForm(JustificatifDepenseType::class, $justificatif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('file')->getData();

            if ($file) {

                // supprimer ancien fichier
                $ancienChemin = $this->getParameter('kernel.project_dir') . '/public/' . $justificatif->getFilepath();

                if (file_exists($ancienChemin)) {
                    unlink($ancienChemin);
                }

                $extension = strtolower($file->guessExtension());
                $allowed = ['pdf', 'png', 'jpg', 'jpeg'];

                if (!in_array($extension, $allowed)) {
                    $this->addFlash('error', 'Format non autorisé.');
                    return $this->redirectToRoute('justificatif_edit', [
                        'id' => $justificatif->getId()
                    ]);
                }

                $filename = uniqid('justif_') . '.' . $extension;

                try {
                    $file->move(
                        $this->getParameter('uploads_dir'),
                        $filename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur upload fichier.');
                }

                $justificatif->setFilepath('uploads/' . $filename);
                $justificatif->setTypefichier($extension);
                $justificatif->setDateajout(new \DateTime());
            }

            $em->flush();

            $this->addFlash('success', 'Justificatif modifié avec succès.');

            return $this->redirectToRoute('justificatif_list', [
                'id' => $depense->getId()
            ]);
        }

        return $this->render('justificatif/edit.html.twig', [
            'form' => $form->createView(),
            'justificatif' => $justificatif,
            'depense' => $depense
        ]);
    }

    // ── DELETE ─────────────────────────────────────────────
    #[Route('/{id}/delete', name: 'justificatif_delete', methods: ['POST'])]
    public function delete(Request $request, JustificatifDepense $justificatif, EntityManagerInterface $em): Response
    {
        $depenseId = $justificatif->getDepense()->getId();

        if ($this->isCsrfTokenValid('delete_justif' . $justificatif->getId(), $request->request->get('_token'))) {

            $chemin = $this->getParameter('kernel.project_dir') . '/public/' . $justificatif->getFilepath();

            if (file_exists($chemin)) {
                unlink($chemin);
            }

            $em->remove($justificatif);
            $em->flush();

            $this->addFlash('success', 'Justificatif supprimé.');
        }
        //reponse 
        return $this->redirectToRoute('justificatif_list', [
            'id' => $depenseId
        ]);
    }
}