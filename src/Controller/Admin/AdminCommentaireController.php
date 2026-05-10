<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/commentaires')]
class AdminCommentaireController extends AbstractController
{
    #[Route('', name: 'admin_commentaire_index', methods: ['GET'])]
    public function index(CommentaireRepository $repo): Response
    {
        return $this->render('admin/commentaire/index.html.twig', [
            'commentaires' => $repo->findBy([], ['dateCreation' => 'DESC'], 50),
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_commentaire_delete', methods: ['POST'])]
    public function delete(Request $request, Commentaire $commentaire, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete_com_'.$commentaire->getId(), $request->request->get('_token'))) {
            $em->remove($commentaire);
            $em->flush();
            $this->addFlash('success', 'Commentaire supprimé.');
        }
        return $this->redirectToRoute('admin_commentaire_index');
    }
}
