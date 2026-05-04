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
        $justificatifs = $repo->findByDepense((int) $depense->getId());

        return $this->render('justificatif/list.html.twig', [
            'depense'       => $depense,
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

                $extension = strtolower((string) $file->guessExtension());
                $allowed   = ['pdf', 'png', 'jpg', 'jpeg'];

                if (!in_array($extension, $allowed)) {
                    $this->addFlash('error', 'Format non autorisé.');
                    return $this->redirectToRoute('justificatif_new', [
                        'id' => $depense->getId()
                    ]);
                }

                $filename   = uniqid('justif_') . '.' . $extension;
                $uploadsDir = $this->getParameter('uploads_dir');
                assert(is_string($uploadsDir));

                try {
                    $file->move($uploadsDir, $filename);
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
            'form'    => $form->createView(),
            'depense' => $depense,
        ]);
    }

    // ── EDIT ───────────────────────────────────────────────
    #[Route('/{id}/edit', name: 'justificatif_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JustificatifDepense $justificatif, EntityManagerInterface $em): Response
    {
        $depense = $justificatif->getDepense();
        if ($depense === null) {
            throw $this->createNotFoundException('Dépense introuvable pour ce justificatif.');
        }

        $form = $this->createForm(JustificatifDepenseType::class, $justificatif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('file')->getData();

            if ($file) {

                $projectDir   = $this->getParameter('kernel.project_dir');
                assert(is_string($projectDir));
                $ancienChemin = $projectDir . '/public/' . $justificatif->getFilepath();

                if (file_exists($ancienChemin)) {
                    unlink($ancienChemin);
                }

                $extension = strtolower((string) $file->guessExtension());
                $allowed   = ['pdf', 'png', 'jpg', 'jpeg'];

                if (!in_array($extension, $allowed)) {
                    $this->addFlash('error', 'Format non autorisé.');
                    return $this->redirectToRoute('justificatif_edit', [
                        'id' => $justificatif->getId()
                    ]);
                }

                $filename   = uniqid('justif_') . '.' . $extension;
                $uploadsDir = $this->getParameter('uploads_dir');
                assert(is_string($uploadsDir));

                try {
                    $file->move($uploadsDir, $filename);
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
            'form'         => $form->createView(),
            'justificatif' => $justificatif,
            'depense'      => $depense,
        ]);
    }

    // ── DELETE ─────────────────────────────────────────────
    #[Route('/{id}/delete', name: 'justificatif_delete', methods: ['POST'])]
    public function delete(Request $request, JustificatifDepense $justificatif, EntityManagerInterface $em): Response
    {
        $depense = $justificatif->getDepense();
        if ($depense === null) {
            throw $this->createNotFoundException('Dépense introuvable pour ce justificatif.');
        }
        $depenseId = $depense->getId();

        $token = (string) $request->request->get('_token');

        if ($this->isCsrfTokenValid('delete_justif' . $justificatif->getId(), $token)) {

            $projectDir = $this->getParameter('kernel.project_dir');
            assert(is_string($projectDir));
            $chemin = $projectDir . '/public/' . $justificatif->getFilepath();

            if (file_exists($chemin)) {
                unlink($chemin);
            }

            $em->remove($justificatif);
            $em->flush();

            $this->addFlash('success', 'Justificatif supprimé.');
        }

        return $this->redirectToRoute('justificatif_list', [
            'id' => $depenseId,
        ]);
    }
}
