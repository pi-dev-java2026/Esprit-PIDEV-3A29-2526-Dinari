<?php
namespace App\Controller\Client;

use App\Service\OtpService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OtpController extends AbstractController
{
    #[Route('/client/otp/send', name: 'app_otp_send', methods: ['POST'])]
    public function send(Request $request, OtpService $otpService): JsonResponse
    {
        $data    = json_decode($request->getContent(), true);
        $email   = trim($data['email']   ?? '');
        $planNom = trim($data['planNom'] ?? 'Premium');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->json(['success' => false, 'error' => 'Email invalide.'], 400);
        }

        try {
            $otpService->sendOtp($email, $planNom);
            return $this->json(['success' => true]);
        } catch (\Throwable $e) {
            return $this->json(['success' => false, 'error' => 'Erreur envoi email.'], 500);
        }
    }

    #[Route('/client/otp/verify', name: 'app_otp_verify', methods: ['POST'])]
    public function verify(Request $request, OtpService $otpService): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $code = trim($data['code'] ?? '');

        if ($otpService->verifyOtp($code)) {
            return $this->json(['success' => true]);
        }

        return $this->json(['success' => false, 'error' => 'Code incorrect ou expiré.'], 400);
    }
}