<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categorie', name: 'admin_categorie_')]
class CategorieController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CategorieRepository $repo): Response
    {
        $categories = $repo->findAllOrderedByLabel();

        $data = [];
        foreach ($categories as $cat) {
            $data[] = [
                'categorie'  => $cat,
                'nbDepenses' => $repo->countDepenses($cat->getId()),
            ];
        }

        return $this->render('admin/categorie/index.html.twig', [
            'data' => $data,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, CategorieRepository $repo): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($repo->labelExiste($categorie->getLabel())) {
                $this->addFlash('error', 'Cette catégorie existe déjà.');
                return $this->redirectToRoute('admin_categorie_new');
            }

            $em->persist($categorie);
            $em->flush();

            $this->addFlash('success', 'Catégorie créée avec succès.');
            return $this->redirectToRoute('admin_categorie_index');
        }

        return $this->render('admin/categorie/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categorie $categorie, EntityManagerInterface $em, CategorieRepository $repo): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($repo->labelExiste($categorie->getLabel(), $categorie->getId())) {
                $this->addFlash('error', 'Cette catégorie existe déjà.');
                return $this->redirectToRoute('admin_categorie_edit', [
                    'id' => $categorie->getId()
                ]);
            }

            $em->flush();

            $this->addFlash('success', 'Catégorie modifiée.');
            return $this->redirectToRoute('admin_categorie_index');
        }

        return $this->render('admin/categorie/edit.html.twig', [
            'form' => $form->createView(),
            'categorie' => $categorie
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Categorie $categorie, EntityManagerInterface $em, CategorieRepository $repo): Response
    {
        if ($this->isCsrfTokenValid('delete_cat' . $categorie->getId(), $request->request->get('_token'))) {

            if ($repo->countDepenses($categorie->getId()) > 0) {
                $this->addFlash('error', 'Impossible de supprimer : catégorie utilisée.');
                return $this->redirectToRoute('admin_categorie_index');
            }

            $em->remove($categorie);
            $em->flush();

            $this->addFlash('success', 'Catégorie supprimée.');
        }

        return $this->redirectToRoute('admin_categorie_index');
    }
}