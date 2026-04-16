<?php

namespace App\Controller\Admin;

use App\Entity\Quiz;
use App\Form\Admin\AdminQuizType;
use App\Repository\QuizRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/quiz')]
class AdminQuizController extends AbstractController
{
    #[Route('', name: 'admin_quiz_index', methods: ['GET'])]
    public function index(QuizRepository $repo): Response
    {
        $quizzes = $repo->findAllWithCours();

        // Static fallback so the page is never empty
        $staticQuizzes = [];
        if (empty($quizzes)) {
            $staticQuizzes = [
                [
                    'id'            => null,
                    'titre'         => 'Quiz — Finance Personnelle (Introduction)',
                    'cours'         => 'Finance Personnelle',
                    'reponseCorrect'=> 'Planifier ses revenus et dépenses',
                    'scoreQuiz'     => 10,
                    'isExamMode'    => false,
                ],
                [
                    'id'            => null,
                    'titre'         => 'Quiz — Budget Personnel',
                    'cours'         => 'Finance Personnelle',
                    'reponseCorrect'=> 'La méthode 50/30/20',
                    'scoreQuiz'     => 10,
                    'isExamMode'    => false,
                ],
                [
                    'id'            => null,
                    'titre'         => 'Quiz — Les bases du budget',
                    'cours'         => 'Les bases du budget',
                    'reponseCorrect'=> 'Un plan de dépenses',
                    'scoreQuiz'     => 10,
                    'isExamMode'    => false,
                ],
                [
                    'id'            => null,
                    'titre'         => 'Quiz — Épargne & investissement',
                    'cours'         => 'Épargne & investissement',
                    'reponseCorrect'=> 'Livret d\'épargne',
                    'scoreQuiz'     => 10,
                    'isExamMode'    => false,
                ],
                [
                    'id'            => null,
                    'titre'         => 'Quiz — Comprendre la banque',
                    'cours'         => 'Comprendre la banque',
                    'reponseCorrect'=> 'Le coût de l\'argent emprunté',
                    'scoreQuiz'     => 10,
                    'isExamMode'    => false,
                ],
                [
                    'id'            => null,
                    'titre'         => 'Quiz Final — Examen de certification',
                    'cours'         => 'Finance Personnelle',
                    'reponseCorrect'=> null,
                    'scoreQuiz'     => 50,
                    'isExamMode'    => true,
                ],
            ];
        }

        // Group by cours — done in PHP to avoid Twig nested-key issues
        $groups    = [];
        $ungrouped = [];
        foreach ($quizzes as $quiz) {
            if ($quiz->getCours()) {
                $key = $quiz->getCours()->getId();
                if (!isset($groups[$key])) {
                    $groups[$key] = ['cours' => $quiz->getCours(), 'quizzes' => []];
                }
                $groups[$key]['quizzes'][] = $quiz;
            } else {
                $ungrouped[] = $quiz;
            }
        }

        return $this->render('admin/quiz/index.html.twig', [
            'quizzes'       => $quizzes,
            'groups'        => $groups,
            'ungrouped'     => $ungrouped,
            'static_quizzes'=> $staticQuizzes,
        ]);
    }

    #[Route('/new', name: 'admin_quiz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $quiz = new Quiz();
        $form = $this->createForm(AdminQuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($quiz);
            $em->flush();
            $this->addFlash('success', 'Quiz créé avec succès.');
            return $this->redirectToRoute('admin_quiz_index');
        }

        return $this->render('admin/quiz/form.html.twig', [
            'form' => $form,
            'quiz' => $quiz,
            'mode' => 'new',
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_quiz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Quiz $quiz, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AdminQuizType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Quiz mis à jour.');
            return $this->redirectToRoute('admin_quiz_index');
        }

        return $this->render('admin/quiz/form.html.twig', [
            'form' => $form,
            'quiz' => $quiz,
            'mode' => 'edit',
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_quiz_delete', methods: ['POST'])]
    public function delete(Request $request, Quiz $quiz, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_quiz_'.$quiz->getId(), $request->request->get('_token'))) {
            $em->remove($quiz);
            $em->flush();
            $this->addFlash('success', 'Quiz supprimé.');
        }
        return $this->redirectToRoute('admin_quiz_index');
    }
}
