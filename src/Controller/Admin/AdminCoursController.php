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
        $coursList = $repo->findAllWithTree();

        // Static fallback so the page is never empty
        $staticCours = [];
        if (empty($coursList)) {
            $staticCours = [
                [
                    'id'          => null,
                    'nomCours'    => 'Finance Personnelle',
                    'description' => 'Comprendre les bases de la finance personnelle : budget, épargne, investissement et gestion financière au quotidien.',
                    'dateCreation'=> new \DateTime('2026-01-01'),
                    'chapitres'   => [
                        ['titre' => 'Introduction',        'sousTitre' => 'Pourquoi gérer ses finances ?', 'position' => 1],
                        ['titre' => 'Budget Personnel',    'sousTitre' => 'Créer et suivre son budget',    'position' => 2],
                        ['titre' => 'Épargne',             'sousTitre' => 'Stratégies d\'épargne efficaces','position' => 3],
                        ['titre' => 'Gestion Financière',  'sousTitre' => 'Contrôler ses dépenses',        'position' => 4],
                        ['titre' => 'Investissement',      'sousTitre' => 'Faire fructifier son argent',   'position' => 5],
                    ],
                ],
                [
                    'id'          => null,
                    'nomCours'    => 'Les bases du budget',
                    'description' => 'Créez et gérez un budget personnel efficace dès le premier mois. Apprenez à catégoriser vos dépenses, fixer des limites et suivre vos finances au quotidien.',
                    'dateCreation'=> new \DateTime('2026-01-01'),
                    'chapitres'   => [],
                ],
                [
                    'id'          => null,
                    'nomCours'    => 'Épargne & investissement',
                    'description' => 'Stratégies pour épargner intelligemment et faire fructifier votre argent. Découvrez les placements adaptés à chaque profil et objectif financier.',
                    'dateCreation'=> new \DateTime('2026-01-15'),
                    'chapitres'   => [],
                ],
                [
                    'id'          => null,
                    'nomCours'    => 'Comprendre la banque',
                    'description' => 'Taux d\'intérêt, crédits, cartes bancaires — tout ce que vous devez savoir pour maîtriser vos relations avec votre banque et éviter les pièges.',
                    'dateCreation'=> new \DateTime('2026-02-01'),
                    'chapitres'   => [],
                ],
            ];
        }

        return $this->render('admin/cours/index.html.twig', [
            'cours_list'   => $coursList,
            'static_cours' => $staticCours,
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
