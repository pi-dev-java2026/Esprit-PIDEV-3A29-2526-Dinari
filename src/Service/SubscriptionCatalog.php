<?php

namespace App\Service;

/**
 * Catalogue des abonnements réels disponibles sur le marché tunisien.
 * Prix en Dinars Tunisiens (DT) — mis à jour avril 2025.
 * Les logos sont récupérés via Clearbit Logo API (gratuit, pas de clé requise).
 */
class SubscriptionCatalog
{
    /**
     * Retourne tous les services du catalogue.
     * Structure de chaque service :
     * @return array<int, array{
     *     slug: string,
     *     nom: string,
     *     categorie: string,
     *     tier: string,
     *     description: string,
     *     site: string,
     *     logo_domain: string,
     *     couleur: string,
     *     prix: array<string, float>,
     *     features: array<int, string>
     * }>
     */
    public static function getAll(): array
    {
        return [

            // ── STREAMING VIDÉO ──────────────────────────────────────────────

            [
                'slug'        => 'netflix-standard',
                'nom'         => 'Netflix Standard',
                'categorie'   => 'streaming',
                'tier'        => 'Gold',
                'description' => 'Films et séries illimités en HD sur 2 écrans simultanés.',
                'site'        => 'https://www.netflix.com/tn',
                'logo_domain' => 'netflix.com',
                'couleur'     => '#E50914',
                'prix'        => ['mensuel' => 15.99, 'annuel' => 159.90],
                'features'    => ['2 écrans simultanés', 'Qualité HD 1080p', 'Téléchargements inclus'],
            ],
            [
                'slug'        => 'netflix-premium',
                'nom'         => 'Netflix Premium',
                'categorie'   => 'streaming',
                'tier'        => 'Platinum',
                'description' => 'Netflix en Ultra HD 4K sur 4 écrans simultanés.',
                'site'        => 'https://www.netflix.com/tn',
                'logo_domain' => 'netflix.com',
                'couleur'     => '#E50914',
                'prix'        => ['mensuel' => 22.99, 'annuel' => 229.90],
                'features'    => ['4 écrans simultanés', 'Qualité Ultra HD 4K', 'Téléchargements inclus'],
            ],
            [
                'slug'        => 'youtube-premium',
                'nom'         => 'YouTube Premium',
                'categorie'   => 'streaming',
                'tier'        => 'Gold',
                'description' => 'YouTube sans publicités + YouTube Music inclus.',
                'site'        => 'https://www.youtube.com/premium',
                'logo_domain' => 'youtube.com',
                'couleur'     => '#FF0000',
                'prix'        => ['mensuel' => 13.99, 'annuel' => 139.90],
                'features'    => ['Sans publicités', 'YouTube Music inclus', 'Lecture en arrière-plan'],
            ],
            [
                'slug'        => 'disney-plus',
                'nom'         => 'Disney+',
                'categorie'   => 'streaming',
                'tier'        => 'Normal',
                'description' => 'Marvel, Star Wars, Pixar, Disney et National Geographic.',
                'site'        => 'https://www.disneyplus.com',
                'logo_domain' => 'disneyplus.com',
                'couleur'     => '#113CCF',
                'prix'        => ['mensuel' => 8.99, 'annuel' => 89.90],
                'features'    => ['4K Ultra HD', '4 écrans simultanés', 'Contenu exclusif Disney'],
            ],
            [
                'slug'        => 'amazon-prime',
                'nom'         => 'Amazon Prime Video',
                'categorie'   => 'streaming',
                'tier'        => 'Silver',
                'description' => 'Films et séries Amazon Originals + livraison rapide.',
                'site'        => 'https://www.primevideo.com',
                'logo_domain' => 'amazon.com',
                'couleur'     => '#00A8E1',
                'prix'        => ['mensuel' => 11.99, 'annuel' => 119.90],
                'features'    => ['Originals exclusifs', '4K HDR', 'Amazon Music inclus'],
            ],

            // ── MUSIQUE ──────────────────────────────────────────────────────

            [
                'slug'        => 'spotify-premium',
                'nom'         => 'Spotify Premium',
                'categorie'   => 'musique',
                'tier'        => 'Silver',
                'description' => 'Musique illimitée sans pub, en écoute hors ligne.',
                'site'        => 'https://www.spotify.com/tn',
                'logo_domain' => 'spotify.com',
                'couleur'     => '#1DB954',
                'prix'        => ['mensuel' => 9.99, 'annuel' => 99.90],
                'features'    => ['100M+ titres', 'Sans publicités', 'Écoute hors ligne'],
            ],
            [
                'slug'        => 'apple-music',
                'nom'         => 'Apple Music',
                'categorie'   => 'musique',
                'tier'        => 'Silver',
                'description' => 'Bibliothèque musicale Apple avec son spatial Dolby Atmos.',
                'site'        => 'https://www.apple.com/apple-music',
                'logo_domain' => 'apple.com',
                'couleur'     => '#FC3C44',
                'prix'        => ['mensuel' => 9.99, 'annuel' => 99.90],
                'features'    => ['Son spatial Dolby Atmos', '100M+ titres', 'Paroles en temps réel'],
            ],
            [
                'slug'        => 'deezer-premium',
                'nom'         => 'Deezer Premium',
                'categorie'   => 'musique',
                'tier'        => 'Normal',
                'description' => 'Musique illimitée avec Flow personnalisé intelligent.',
                'site'        => 'https://www.deezer.com',
                'logo_domain' => 'deezer.com',
                'couleur'     => '#A238FF',
                'prix'        => ['mensuel' => 7.99, 'annuel' => 79.90],
                'features'    => ['Flow personnalisé', 'Qualité FLAC', 'Paroles synchronisées'],
            ],

            // ── PRODUCTIVITÉ ─────────────────────────────────────────────────

            [
                'slug'        => 'chatgpt-plus',
                'nom'         => 'ChatGPT Plus',
                'categorie'   => 'productivite',
                'tier'        => 'Platinum',
                'description' => 'Accès prioritaire à GPT-4o, DALL·E 3 et plugins.',
                'site'        => 'https://chat.openai.com',
                'logo_domain' => 'openai.com',
                'couleur'     => '#10A37F',
                'prix'        => ['mensuel' => 20.00, 'annuel' => 200.00],
                'features'    => ['GPT-4o accès complet', 'DALL·E 3 image gen', 'Plugins & web browsing'],
            ],
            [
                'slug'        => 'microsoft-365',
                'nom'         => 'Microsoft 365 Personnel',
                'categorie'   => 'productivite',
                'tier'        => 'Silver',
                'description' => 'Word, Excel, PowerPoint, OneDrive 1To + Copilot AI.',
                'site'        => 'https://www.microsoft.com/fr-tn/microsoft-365',
                'logo_domain' => 'microsoft.com',
                'couleur'     => '#0078D4',
                'prix'        => ['mensuel' => 10.99, 'annuel' => 109.90],
                'features'    => ['Suite Office complète', '1 To OneDrive', 'Copilot AI intégré'],
            ],
            [
                'slug'        => 'adobe-creative',
                'nom'         => 'Adobe Creative Cloud',
                'categorie'   => 'productivite',
                'tier'        => 'Platinum',
                'description' => 'Photoshop, Illustrator, Premiere Pro + 20 apps Adobe.',
                'site'        => 'https://www.adobe.com/fr/creativecloud.html',
                'logo_domain' => 'adobe.com',
                'couleur'     => '#FF0000',
                'prix'        => ['mensuel' => 54.99, 'annuel' => 549.90],
                'features'    => ['20+ apps créatives', '100 Go stockage cloud', 'Adobe Fonts illimité'],
            ],
            [
                'slug'        => 'canva-pro',
                'nom'         => 'Canva Pro',
                'categorie'   => 'productivite',
                'tier'        => 'Silver',
                'description' => 'Design professionnel avec IA, templates premium et brand kit.',
                'site'        => 'https://www.canva.com/fr_tn/pricing',
                'logo_domain' => 'canva.com',
                'couleur'     => '#8B3DFF',
                'prix'        => ['mensuel' => 12.99, 'annuel' => 129.90],
                'features'    => ['100M+ templates', 'Background remover IA', 'Brand Kit illimité'],
            ],
            [
                'slug'        => 'notion-plus',
                'nom'         => 'Notion Plus',
                'categorie'   => 'productivite',
                'tier'        => 'Normal',
                'description' => 'Workspace tout-en-un : notes, bases de données, IA.',
                'site'        => 'https://www.notion.so/pricing',
                'logo_domain' => 'notion.so',
                'couleur'     => '#000000',
                'prix'        => ['mensuel' => 8.00, 'annuel' => 80.00],
                'features'    => ['Pages illimitées', 'Notion AI inclus', 'Partage invité illimité'],
            ],

            // ── GAMING ───────────────────────────────────────────────────────

            [
                'slug'        => 'playstation-plus',
                'nom'         => 'PlayStation Plus Essential',
                'categorie'   => 'gaming',
                'tier'        => 'Gold',
                'description' => 'Jeux gratuits mensuels + multijoueur en ligne PS4/PS5.',
                'site'        => 'https://www.playstation.com/fr-tn/ps-plus',
                'logo_domain' => 'playstation.com',
                'couleur'     => '#003791',
                'prix'        => ['mensuel' => 16.99, 'annuel' => 169.90],
                'features'    => ['2-3 jeux gratuits/mois', 'Multijoueur en ligne', '100 Go save cloud'],
            ],
            [
                'slug'        => 'xbox-game-pass',
                'nom'         => 'Xbox Game Pass Ultimate',
                'categorie'   => 'gaming',
                'tier'        => 'Gold',
                'description' => 'Bibliothèque de 100+ jeux Xbox + EA Play + Cloud Gaming.',
                'site'        => 'https://www.xbox.com/fr-FR/xbox-game-pass',
                'logo_domain' => 'xbox.com',
                'couleur'     => '#107C10',
                'prix'        => ['mensuel' => 14.99, 'annuel' => 149.90],
                'features'    => ['100+ jeux inclus', 'Cloud Gaming', 'EA Play inclus'],
            ],

            // ── ÉDUCATION ────────────────────────────────────────────────────

            [
                'slug'        => 'duolingo-plus',
                'nom'         => 'Duolingo Plus',
                'categorie'   => 'education',
                'tier'        => 'Normal',
                'description' => 'Apprentissage des langues sans pub avec pratique illimitée.',
                'site'        => 'https://www.duolingo.com/plus',
                'logo_domain' => 'duolingo.com',
                'couleur'     => '#58CC02',
                'prix'        => ['mensuel' => 6.99, 'annuel' => 69.90],
                'features'    => ['Sans publicités', 'Vies illimitées', 'Mode hors ligne'],
            ],
            [
                'slug'        => 'coursera-plus',
                'nom'         => 'Coursera Plus',
                'categorie'   => 'education',
                'tier'        => 'Gold',
                'description' => '7000+ cours certifiants de Google, IBM, Meta et grandes universités.',
                'site'        => 'https://www.coursera.org/courseraplus',
                'logo_domain' => 'coursera.org',
                'couleur'     => '#0056D2',
                'prix'        => ['mensuel' => 39.00, 'annuel' => 390.00],
                'features'    => ['7000+ cours', 'Certificats inclus', 'Accès illimité 1 an'],
            ],

            // ── SÉCURITÉ ─────────────────────────────────────────────────────

            [
                'slug'        => 'nordvpn',
                'nom'         => 'NordVPN',
                'categorie'   => 'securite',
                'tier'        => 'Silver',
                'description' => 'VPN ultra-rapide avec protection Threat Protection intégrée.',
                'site'        => 'https://nordvpn.com/fr',
                'logo_domain' => 'nordvpn.com',
                'couleur'     => '#4687FF',
                'prix'        => ['mensuel' => 11.99, 'annuel' => 71.88],
                'features'    => ['6200+ serveurs', 'Threat Protection', '6 appareils simultanés'],
            ],
        ];
    }

    /**
     * Retourne un service par son slug.
     * 
     * @return array<string, mixed>|null
     */
    public static function getBySlug(string $slug): ?array
    {
        foreach (self::getAll() as $service) {
            if ($service['slug'] === $slug) {
                return $service;
            }
        }
        return null;
    }

    /**
     * Retourne tous les slugs déjà utilisés (pour éviter les doublons).
     * 
     * @return array<int, string>
     */
    public static function getSlugs(): array
    {
        $slugs = [];
        foreach (self::getAll() as $service) {
            $slugs[] = (string) $service['slug'];
        }
        return $slugs;
    }

    /**
     * Retourne les services groupés par catégorie.
     * 
     * @return array<string, array<int, array<string, mixed>>>
     */
    public static function groupedByCategorie(): array
    {
        /** @var array<string, array<int, array<string, mixed>>> $grouped */
        $grouped = [];
        foreach (self::getAll() as $service) {
            $categorie = (string) $service['categorie'];
            if (!isset($grouped[$categorie])) {
                $grouped[$categorie] = [];
            }
            $grouped[$categorie][] = $service;
        }
        return $grouped;
    }

    /**
     * Labels lisibles pour les catégories.
     */
    public static function getCategorieLabel(string $categorie): string
    {
        return match($categorie) {
            'streaming'   => '🎬 Streaming Vidéo',
            'musique'     => '🎵 Musique',
            'productivite'=> '💼 Productivité',
            'gaming'      => '🎮 Gaming',
            'education'   => '📚 Éducation',
            'securite'    => '🔒 Sécurité',
            default       => ucfirst($categorie),
        };
    }
}