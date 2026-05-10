<?php

namespace App\Controller\Client;

use App\Entity\Commentaire;
use App\Entity\Cours;
use App\Entity\Reaction;
use App\Form\CoursType;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/cours')]
final class CoursController extends AbstractController
{
    private const SLUG = 'finance-personnelle'; // @phpstan-ignore classConstant.unused

    #[Route(name: 'app_cours_index', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $em, CommentaireRepository $repo): Response
    {
        $session = $request->getSession();
        $myIds   = array_map('intval', $session->get('my_comment_ids', []));
        $error   = null;

        // Load all courses for the listing
        $coursList = $em->getRepository(Cours::class)->findBy([], ['id' => 'DESC'], 20);

        // Selected course: from query param or first available
        $selectedId = $request->query->getInt('id', 0);
        $selected   = $selectedId
            ? $em->getRepository(Cours::class)->find($selectedId)
            : ($coursList[0] ?? null);

        if ($request->isMethod('POST') && $request->request->get('_action') === 'comment') {
            $auteur   = trim($request->request->get('auteur', ''));
            $contenu  = trim($request->request->get('contenu', ''));
            $chapitre = trim($request->request->get('chapitre', 'introduction'));

            $allowed = ['introduction','budget','epargne','gestion','investissement'];
            if (!in_array($chapitre, $allowed, true)) {
                $chapitre = 'introduction';
            }

            if ($auteur === '' || $contenu === '') {
                $error = 'Veuillez remplir tous les champs.';
            } else {
                $c = new Commentaire();
                $c->setAuteur(htmlspecialchars($auteur, ENT_QUOTES));
                $c->setContenu(htmlspecialchars($contenu, ENT_QUOTES));

                // Use the selected course's contenu field as slug, never a URL
                $slug = $selected ? ($selected->getContenu() ?? 'finance-personnelle') : 'finance-personnelle';
                // Strip any accidental full URL (safety net)
                if (str_contains($slug, '://')) {
                    $parts = array_filter(explode('/', parse_url($slug, PHP_URL_PATH) ?? ''));
                    $slug  = end($parts) ?: 'finance-personnelle';
                }
                $c->setCoursSlug($slug);
                $c->setChapitre($chapitre);
                $em->persist($c);
                $em->flush();

                $myIds[] = (int) $c->getId();
                $session->set('my_comment_ids', $myIds);

                return $this->redirectToRoute('app_cours_index', ['_fragment' => 'commentaires']);
            }
        }

        $slug         = $selected ? ($selected->getContenu() ?? 'finance-personnelle') : 'finance-personnelle';
        $commentaires = $repo->findBySlug($slug);
        $sessionId    = $request->getSession()->getId();

        $commentsByChapter = [];
        $myReactions = [];
        foreach ($commentaires as $c) {
            $ch = $c->getChapitre() ?? 'introduction';
            $commentsByChapter[$ch][] = $c;
            $myReactions[$c->getId()] = [];
            foreach ($c->getReactions() as $r) {
                if ($r->getSessionId() === $sessionId) {
                    $myReactions[$c->getId()][] = $r->getEmoji();
                }
            }
        }

        return $this->render('client/cours/index.html.twig', [
            'cours_list'          => $coursList,
            'selected'            => $selected,
            'commentaires'        => $commentaires,
            'comments_by_chapter' => $commentsByChapter,
            'my_ids'              => array_map('strval', $myIds),
            'my_reactions'        => $myReactions,
            'error'               => $error,
        ]);
    }

    #[Route('/commentaire/{id}/edit', name: 'app_commentaire_edit', methods: ['POST'])]
    public function editComment(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $myIds   = array_map('intval', $session->get('my_comment_ids', []));

        $c = $em->getRepository(Commentaire::class)->find($id);
        if (!$c || !in_array($id, $myIds, true)) {
            throw $this->createAccessDeniedException();
        }

        $contenu = trim($request->request->get('contenu', ''));
        if ($contenu !== '') {
            $c->setContenu(htmlspecialchars($contenu, ENT_QUOTES));
            $em->flush();
        }

        return $this->redirectToRoute('app_cours_index', ['_fragment' => 'commentaires']);
    }

    #[Route('/commentaire/{id}/delete', name: 'app_commentaire_delete', methods: ['POST'])]
    public function deleteComment(int $id, Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $myIds   = array_map('intval', $session->get('my_comment_ids', []));

        $c = $em->getRepository(Commentaire::class)->find($id);
        if (!$c || !in_array($id, $myIds, true)) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete_comment_'.$id, $request->request->get('_token'))) {
            $em->remove($c);
            $em->flush();
            $session->set('my_comment_ids', array_values(array_filter($myIds, fn($i) => $i !== $id)));
        }

        return $this->redirectToRoute('app_cours_index', ['_fragment' => 'commentaires']);
    }

    #[Route('/commentaire/{id}/react', name: 'app_commentaire_react', methods: ['POST'])]
    public function react(int $id, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $allowed = ['👍','👎','😄','🎉','😮','❤️','🚀','👀'];
        $emoji   = $request->request->get('emoji', '');

        if (!in_array($emoji, $allowed, true)) {
            return new JsonResponse(['error' => 'invalid'], 400);
        }

        $c = $em->getRepository(Commentaire::class)->find($id);
        if (!$c) {
            return new JsonResponse(['error' => 'not found'], 404);
        }

        $sessionId = $request->getSession()->getId();

        $existing = $em->getRepository(Reaction::class)->findOneBy([
            'commentaire' => $c,
            'sessionId'   => $sessionId,
            'emoji'       => $emoji,
        ]);

        if ($existing) {
            $em->remove($existing);
        } else {
            $r = new Reaction();
            $r->setCommentaire($c);
            $r->setEmoji($emoji);
            $r->setSessionId($sessionId);
            $em->persist($r);
        }

        $em->flush();
        $em->refresh($c);

        $counts   = $c->getReactionCounts();
        $myReacts = [];
        foreach ($c->getReactions() as $r) {
            if ($r->getSessionId() === $sessionId) {
                $myReacts[] = $r->getEmoji();
            }
        }

        return new JsonResponse(['counts' => $counts, 'mine' => $myReacts]);
    }

    #[Route('/new', name: 'app_cours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $cour = new Cours();
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($cour);
            $em->flush();
            return $this->redirectToRoute('app_cours_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('client/cours/new.html.twig', ['cour' => $cour, 'form' => $form]);
    }

    #[Route('/{id}', name: 'app_cours_show', methods: ['GET'])]
    public function show(Cours $cour): Response
    {
        return $this->render('client/cours/show.html.twig', ['cour' => $cour]);
    }

    #[Route('/{id}/edit', name: 'app_cours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cours $cour, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('app_cours_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('client/cours/edit.html.twig', ['cour' => $cour, 'form' => $form]);
    }

    #[Route('/{id}', name: 'app_cours_delete', methods: ['POST'])]
    public function delete(Request $request, Cours $cour, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cour->getId(), $request->getPayload()->getString('_token'))) {
            $em->remove($cour);
            $em->flush();
        }
        return $this->redirectToRoute('app_cours_index', [], Response::HTTP_SEE_OTHER);
    }
}
