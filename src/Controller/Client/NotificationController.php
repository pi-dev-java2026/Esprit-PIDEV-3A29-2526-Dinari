<?php

namespace App\Controller\Client;

use App\Entity\Notification;
use App\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/notifications')]
class NotificationController extends AbstractController
{
    #[Route('', name: 'app_notifications', methods: ['GET'])]
    public function index(Request $request, NotificationRepository $repo): Response
    {
        $sessionId     = $request->getSession()->getId();
        $notifications = $repo->findBySession($sessionId);

        return $this->render('client/notifications/index.html.twig', [
            'notifications' => $notifications,
        ]);
    }

    #[Route('/unread-count', name: 'app_notifications_unread_count', methods: ['GET'])]
    public function unreadCount(Request $request, NotificationRepository $repo): JsonResponse
    {
        $sessionId = $request->getSession()->getId();
        return new JsonResponse(['count' => $repo->countUnread($sessionId)]);
    }

    #[Route('/{id}/read', name: 'app_notification_mark_read', methods: ['POST'])]
    public function markRead(int $id, Request $request, EntityManagerInterface $em, NotificationRepository $repo): JsonResponse
    {
        $sessionId = $request->getSession()->getId();
        $notif     = $repo->find($id);

        if (!$notif || $notif->getSessionId() !== $sessionId) {
            return new JsonResponse(['error' => 'Not found'], 404);
        }

        $notif->setIsRead(true);
        $em->flush();

        return new JsonResponse(['success' => true]);
    }

    #[Route('/mark-all-read', name: 'app_notifications_mark_all_read', methods: ['POST'])]
    public function markAllRead(Request $request, NotificationRepository $repo): JsonResponse
    {
        $sessionId = $request->getSession()->getId();
        $repo->markAllRead($sessionId);

        return new JsonResponse(['success' => true]);
    }
}
