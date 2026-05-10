<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/face', name: 'app_face_')]
class FaceController extends AbstractController
{
    /**
     * POST /face/capture
     * Receives a base64 image from the webcam, saves it to public/faces/,
     * runs the Python face_verify.py script, and returns JSON.
     */
    #[Route('/capture', name: 'capture', methods: ['POST'])]
    public function capture(Request $request, EntityManagerInterface $em): JsonResponse
    {
        // ── 1. Decode the base64 image from the request ──────────────
        $data = json_decode($request->getContent(), true);
        $imageData = $data['image'] ?? null;
        $userId    = $data['user_id'] ?? null;   // optional: save directly to user

        if (!$imageData) {
            return new JsonResponse(['ok' => false, 'error' => 'Aucune image reçue.'], 400);
        }

        // Strip "data:image/png;base64," prefix
        if (str_contains($imageData, ',')) {
            [, $imageData] = explode(',', $imageData, 2);
        }

        $binaryImage = base64_decode($imageData);
        if ($binaryImage === false || strlen($binaryImage) < 100) {
            return new JsonResponse(['ok' => false, 'error' => 'Image corrompue ou trop petite.'], 400);
        }

        // ── 2. Save to public/faces/ ─────────────────────────────────
        $facesDir = $this->getParameter('kernel.project_dir') . '/public/faces';
        if (!is_dir($facesDir)) {
            mkdir($facesDir, 0755, true);
        }

        $filename  = 'face_' . uniqid('', true) . '.png';
        $filepath  = $facesDir . '/' . $filename;
        $publicPath = 'faces/' . $filename;       // relative path stored in DB

        if (file_put_contents($filepath, $binaryImage) === false) {
            return new JsonResponse(['ok' => false, 'error' => 'Impossible de sauvegarder l\'image.'], 500);
        }

        // ── 3. Run Python face_verify.py ─────────────────────────────
        $scriptPath = $this->getParameter('kernel.project_dir') . '/scripts/face_verify.py';
        $python     = $this->detectPython();

        $command = sprintf('%s %s %s 2>&1',
            escapeshellcmd($python),
            escapeshellarg($scriptPath),
            escapeshellarg($filepath)
        );

        $output   = null;
        $exitCode = null;
        exec($command, $outputLines, $exitCode);
        $output = implode("\n", $outputLines);

        // Try to parse JSON result from Python script
        $result = null;
        if (preg_match('/\{.*\}/s', $output, $matches)) {
            $result = json_decode($matches[0], true);
        }
        
        if (!is_array($result)) {
            $result = ['ok' => false, 'error' => 'Erreur du script : ' . $output];
        }

        // ── 4. If validation failed, delete the temp image ───────────
        if (!($result['ok'] ?? false)) {
            @unlink($filepath);
            return new JsonResponse($result, 422);
        }

        // ── 5. Optionally link image to a user right away ────────────
        if ($userId) {
            /** @var User|null $user */
            $user = $em->getRepository(User::class)->find((int)$userId);
            if ($user) {
                // Delete old face image if it exists
                $oldPath = $user->getFace_image();
                if ($oldPath) {
                    $oldFile = $this->getParameter('kernel.project_dir') . '/public/' . $oldPath;
                    if (file_exists($oldFile)) {
                        @unlink($oldFile);
                    }
                }
                $user->setFace_image($publicPath);
                $em->flush();
            }
        }

        return new JsonResponse([
            'ok'      => true,
            'path'    => $publicPath,
            'message' => $result['message'] ?? 'Visage enregistré avec succès.',
        ]);
    }

    /**
     * POST /face/save-path
     * Saves a previously validated face path to a specific user
     * (called on form submission after successful capture).
     */
    #[Route('/save-path', name: 'save_path', methods: ['POST'])]
    public function savePath(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data   = json_decode($request->getContent(), true);
        $userId = $data['user_id'] ?? null;
        $path   = $data['path']    ?? null;

        if (!$userId || !$path) {
            return new JsonResponse(['ok' => false, 'error' => 'Données manquantes.'], 400);
        }

        // Security: path must be inside public/faces/
        if (!str_starts_with($path, 'faces/') || str_contains($path, '..')) {
            return new JsonResponse(['ok' => false, 'error' => 'Chemin invalide.'], 400);
        }
        $fullPath = $this->getParameter('kernel.project_dir') . '/public/' . $path;
        if (!file_exists($fullPath)) {
            return new JsonResponse(['ok' => false, 'error' => 'Fichier image introuvable.'], 404);
        }

        /** @var User|null $user */
        $user = $em->getRepository(User::class)->find((int)$userId);
        if (!$user) {
            return new JsonResponse(['ok' => false, 'error' => 'Utilisateur introuvable.'], 404);
        }

        // Delete old face
        $oldPath = $user->getFace_image();
        if ($oldPath && $oldPath !== $path) {
            $oldFile = $this->getParameter('kernel.project_dir') . '/public/' . $oldPath;
            if (file_exists($oldFile)) {
                @unlink($oldFile);
            }
        }

        $user->setFace_image($path);
        $em->flush();

        return new JsonResponse(['ok' => true]);
    }

    // ── 6. 2FA Face Verification ─────────────────────────────────────
    
    /**
     * GET /face/verify
     * Affiche l'écran 2FA où la webcam est activée pour confirmer l'identité post-login.
     */
    #[Route('/verify', name: 'verify', methods: ['GET'])]
    public function verifyView(Request $request): Response
    {
        // Si l'utilisateur n'est pas authentifié ou n'a pas déclenché la 2FA, on dégage
        if (!$this->getUser() || !$request->getSession()->get('face_2fa_pending')) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('face/verify.html.twig');
    }

    /**
     * POST /face/compare
     * Reçoit la photo Base64 via l'interface 2FA, la sauvegarde en fichier temporaire,
     * et exécute face_compare.py pour la comparer avec l'image racine de l'utilisateur.
     */
    #[Route('/compare', name: 'compare', methods: ['POST'])]
    public function compare(Request $request, EntityManagerInterface $em): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->getUser();
        if (!$user || !$request->getSession()->get('face_2fa_pending')) {
            return new JsonResponse(['ok' => false, 'error' => 'Action non autorisée.'], 403);
        }

        $dbFacePath = $user->getFace_image();
        if (!$dbFacePath) {
            // Le flag était actif mais aucune image n'existe (improbable en théorie)
            $request->getSession()->remove('face_2fa_pending');
            return new JsonResponse(['ok' => true]);
        }
        
        $dbFile = $this->getParameter('kernel.project_dir') . '/public/' . $dbFacePath;

        $data = json_decode($request->getContent(), true);
        $imageData = $data['image'] ?? null;
        if (!$imageData) {
            return new JsonResponse(['ok' => false, 'error' => 'Aucune image envoyée.'], 400);
        }

        if (str_contains($imageData, ',')) {
            [, $imageData] = explode(',', $imageData, 2);
        }

        $binaryImage = base64_decode($imageData);
        if ($binaryImage === false || strlen($binaryImage) < 100) {
            return new JsonResponse(['ok' => false, 'error' => 'Image reçue corrompue.'], 400);
        }

        // Ecrire le fichier temporaire
        $facesDir = $this->getParameter('kernel.project_dir') . '/public/faces';
        $filename = 'face_tmp_' . uniqid() . '.png';
        $filepath = $facesDir . '/' . $filename;

        if (file_put_contents($filepath, $binaryImage) === false) {
            return new JsonResponse(['ok' => false, 'error' => 'Erreur de sauvegarde temporaire.'], 500);
        }

        // Lancement Python compare
        $scriptPath = $this->getParameter('kernel.project_dir') . '/scripts/face_compare.py';
        $python     = $this->detectPython();

        $command = sprintf('%s %s %s %s 2>&1',
            escapeshellcmd($python),
            escapeshellarg($scriptPath),
            escapeshellarg($filepath),
            escapeshellarg($dbFile)
        );

        exec($command, $outputLines, $exitCode);
        $output = implode("\n", $outputLines);

        @unlink($filepath); // Détruire la nouvelle photo de vérification

        // Parser le JSON
        $result = null;
        if (preg_match('/\{.*\}/s', $output, $matches)) {
            $result = json_decode($matches[0], true);
        }
        
        if (!is_array($result)) {
             return new JsonResponse(['ok' => false, 'error' => 'Vérification échouée. Veuillez utiliser un meilleur éclairage.']);
        }

        if ($result['ok'] === true) {
            // C'est validé ! On retire le cadenas de sécurité
            $request->getSession()->remove('face_2fa_pending');
            return new JsonResponse(['ok' => true, 'message' => 'Identité confirmée. Redirection en cours...']);
        } else {
            return new JsonResponse(['ok' => false, 'error' => $result['error'] ?? 'Visage non reconnu.'], 401);
        }
    }

    // ── Helpers ──────────────────────────────────────────────────────

    private function detectPython(): string
    {
        // Try common Python executables on Windows / Linux
        foreach (['py', 'python3', 'python'] as $cmd) {
            $test = @shell_exec(escapeshellcmd($cmd) . ' --version 2>&1');
            if ($test && str_contains($test, 'Python')) {
                return $cmd;
            }
        }
        return 'python'; // fallback
    }
}
