<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Service de scraping / récupération des données réelles des abonnements.
 * Utilise Clearbit Logo API (gratuit, sans clé) pour les logos officiels.
 */
class ScraperService
{
    public function __construct(
        private readonly HttpClientInterface $httpClient
    ) {}

    /**
     * Retourne l'URL du logo officiel d'un service via Clearbit Logo API.
     * Exemple : getLogoUrl('netflix.com') → 'https://logo.clearbit.com/netflix.com'
     */
    public function getLogoUrl(string $domain): string
    {
        return 'https://logo.clearbit.com/' . $domain;
    }

    /**
     * Vérifie que le logo est accessible et retourne l'URL si ok,
     * sinon retourne null (on utilisera un fallback).
     */
    public function fetchLogoUrl(string $domain): ?string
    {
        try {
            $url      = $this->getLogoUrl($domain);
            $response = $this->httpClient->request('HEAD', $url, [
                'timeout' => 3,
            ]);

            if ($response->getStatusCode() === 200) {
                return $url;
            }
        } catch (\Exception $e) {
            // Logo non accessible, on retourne null
        }

        return null;
    }

    /**
     * Télécharge le logo et le sauvegarde localement dans public/uploads/logos/.
     * Retourne le chemin relatif sauvegardé.
     */
    public function downloadAndSaveLogo(string $domain, string $slug, string $projectDir): ?string
    {
        $logoUrl   = $this->getLogoUrl($domain);
        $uploadDir = $projectDir . '/public/uploads/logos/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $filename = $slug . '.png';
        $filepath = $uploadDir . $filename;

        // Si déjà téléchargé, on réutilise
        if (file_exists($filepath)) {
            return 'uploads/logos/' . $filename;
        }

        try {
            $response = $this->httpClient->request('GET', $logoUrl, [
                'timeout' => 5,
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (compatible; DinariApp/1.0)',
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $content = $response->getContent();
                // La méthode getContent() retourne toujours une string (peut être vide)
                if ($content !== '') {
                    file_put_contents($filepath, $content);
                    return 'uploads/logos/' . $filename;
                }
            }
        } catch (\Exception $e) {
            // Échec du téléchargement
        }

        return null;
    }

    /**
     * Essaie de scraper le vrai prix depuis la page officielle du service.
     * Fonctionne pour Canva, Notion, Duolingo (sites sans protection JS).
     * Pour les autres (Netflix, Spotify), retourne null → on utilise le prix catalogue.
     */
    public function scrapePrix(string $slug, string $siteUrl): ?float
    {
        // Sites qu'on peut scraper directement
        /** @var array<string, array{url: string, selector: string}> $scrapableMap */
        $scrapableMap = [
            'notion-plus'   => ['url' => 'https://www.notion.so/pricing',     'selector' => '.price'],
            'canva-pro'     => ['url' => 'https://www.canva.com/fr_tn/pricing','selector' => '[data-testid="price"]'],
            'duolingo-plus' => ['url' => 'https://www.duolingo.com/plus',      'selector' => '.price-amount'],
        ];

        if (!isset($scrapableMap[$slug])) {
            return null; // Service non scrapable → prix catalogue utilisé
        }

        try {
            $response = $this->httpClient->request('GET', $scrapableMap[$slug]['url'], [
                'timeout' => 6,
                'headers' => [
                    'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                    'Accept-Language' => 'fr-TN,fr;q=0.9',
                ],
            ]);

            $html = $response->getContent();

            // Extraction basique via regex si DOM indisponible
            if (preg_match('/(\d+[.,]\d{2})\s*(DT|\$|€|TND)/i', $html, $matches)) {
                $priceStr = str_replace(',', '.', $matches[1]);
                return (float) $priceStr;
            }
        } catch (\Exception $e) {
            // Scraping échoué
        }

        return null;
    }

    /**
     * Enrichit un service du catalogue avec les données réelles :
     * - Logo téléchargé en local
     * - Prix scrapé si disponible
     *
     * @param array<string, mixed> $service
     * @return array<string, mixed>
     */
    public function enrichService(array $service, string $projectDir, string $frequence = 'mensuel'): array
    {
        // 1. Logo officiel
        $logoDomain = (string) ($service['logo_domain'] ?? '');
        $slug = (string) ($service['slug'] ?? '');
        
        $logoPath = $this->downloadAndSaveLogo($logoDomain, $slug, $projectDir);

        // 2. Prix scrapé (si disponible)
        $siteUrl = (string) ($service['site'] ?? '');
        $prixScraped = $this->scrapePrix($slug, $siteUrl);

        // 3. Prix final : scrapé > catalogue
        /** @var array<string, float> $prixArray */
        $prixArray = $service['prix'] ?? [];
        $prixCatalogue = $prixArray[$frequence] ?? $prixArray['mensuel'] ?? 0.0;
        
        $prix = $prixScraped ?? (float) $prixCatalogue;

        return [
            'nom'         => (string) ($service['nom'] ?? ''),
            'prix'        => $prix,
            'frequence'   => $frequence,
            'categorie'   => (string) ($service['categorie'] ?? ''),
            'tier'        => (string) ($service['tier'] ?? ''),
            'image_path'  => $logoPath,
            'prix_source' => $prixScraped !== null ? 'scraped' : 'catalogue',
        ];
    }
}