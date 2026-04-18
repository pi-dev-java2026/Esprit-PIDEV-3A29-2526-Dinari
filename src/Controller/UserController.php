<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/users', name: 'app_user_')]
class UserController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');

        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getRole() === 'User') {
            return $this->redirectToRoute('app_user_show', ['id' => $currentUser->getId()]);
        }

        $users = $userRepository->findBySearch($search, $sort);

        return $this->render('user/index.html.twig', [
            'users' => $users,
            'search' => $search,
            'sort' => $sort,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getRole() === 'User') {
            throw $this->createAccessDeniedException('Vous n\'avez pas la permission de créer un utilisateur.');
        }

        $user = new User();
        $form = $this->createForm(UserType::class, $user, [
            'is_new' => true,
            'is_admin' => $this->isGranted('ROLE_ADMIN')
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            if ($plainPassword) {
                $user->setPassword($hasher->hashPassword($user, $plainPassword));
            }

            // Save face image path captured via the camera widget
            $facePath = trim((string) $request->request->get('face_image_path', ''));
            if ($facePath && str_starts_with($facePath, 'faces/') && !str_contains($facePath, '..')) {
                $fullFacePath = $this->getParameter('kernel.project_dir') . '/public/' . $facePath;
                if (file_exists($fullFacePath)) {
                    $user->setFace_image($facePath);
                }
            }

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Utilisateur créé avec succès.');
            return $this->redirectToRoute('app_user_index');
        }

        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(User $user): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getRole() === 'User' && $currentUser->getId() !== $user->getId()) {
            throw $this->createAccessDeniedException('Vous ne pouvez voir que votre propre profil.');
        }

        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getRole() === 'User' && $currentUser->getId() !== $user->getId()) {
            throw $this->createAccessDeniedException('Vous ne pouvez modifier que votre propre profil.');
        }

        $form = $this->createForm(UserType::class, $user, [
            'is_new' => false,
            'is_admin' => $this->isGranted('ROLE_ADMIN')
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            if ($plainPassword) {
                $user->setPassword($hasher->hashPassword($user, $plainPassword));
            }

            // Save / update face image path captured via the camera widget
            $facePath = trim((string) $request->request->get('face_image_path', ''));
            if ($facePath && str_starts_with($facePath, 'faces/') && !str_contains($facePath, '..')) {
                $fullFacePath = $this->getParameter('kernel.project_dir') . '/public/' . $facePath;
                if (file_exists($fullFacePath)) {
                    // Remove old face file if it was replaced
                    $oldPath = $user->getFace_image();
                    if ($oldPath && $oldPath !== $facePath) {
                        $oldFile = $this->getParameter('kernel.project_dir') . '/public/' . $oldPath;
                        if (file_exists($oldFile)) {
                            @unlink($oldFile);
                        }
                    }
                    $user->setFace_image($facePath);
                }
            }

            $em->flush();
            $this->addFlash('success', 'Utilisateur modifié avec succès.');
            return $this->redirectToRoute('app_user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/delete', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $em, \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface $tokenStorage): Response
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getRole() === 'User' && $currentUser->getId() !== $user->getId()) {
            throw $this->createAccessDeniedException('Vous ne pouvez supprimer que votre propre profil.');
        }

        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            $isSelfDelete = ($currentUser && $currentUser->getId() === $user->getId());
            $em->remove($user);
            $em->flush();
            $this->addFlash('success', 'Profil supprimé.');
            
            if ($isSelfDelete) {
                $tokenStorage->setToken(null);
                $request->getSession()->invalidate();
                return $this->redirectToRoute('app_login');
            }
        }
        return $this->redirectToRoute('app_user_index');
    }

    #[Route('/{id}/toggle-block', name: 'toggle_block', methods: ['POST'])]
    public function toggleBlock(Request $request, User $user, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        /** @var User $currentUser */
        $currentUser = $this->getUser();
        if ($currentUser && $currentUser->getId() === $user->getId()) {
            $this->addFlash('error', 'Vous ne pouvez pas bloquer votre propre compte.');
            return $this->redirectToRoute('app_user_index');
        }

        if ($this->isCsrfTokenValid('toggle_block' . $user->getId(), $request->request->get('_token'))) {
            $reason = trim((string) $request->request->get('block_reason'));
            $user->setIsBlockedByAdmin(!$user->isBlockedByAdmin());
            
            if ($user->isBlockedByAdmin()) {
                $user->setBlockReason($reason ?: 'Action administrateur');
                $this->addFlash('success', 'Utilisateur bloqué avec succès.');
            } else {
                $user->setBlockReason(null);
                $this->addFlash('success', 'Utilisateur débloqué avec succès.');
            }
            $em->flush();
        }

        return $this->redirectToRoute('app_user_index');
    }
}
