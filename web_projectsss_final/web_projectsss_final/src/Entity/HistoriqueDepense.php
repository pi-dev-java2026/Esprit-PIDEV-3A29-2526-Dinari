<?php

namespace App\Entity;

use App\Repository\HistoriqueDepenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueDepenseRepository::class)]
#[ORM\Table(name: 'historique_depense')]
class HistoriqueDepense
{
    const ACTION_CREE     = 'CRÉÉ';
    const ACTION_MODIFIE  = 'MODIFIÉ';
    const ACTION_SUPPRIME = 'SUPPRIMÉ';

    const TYPE_DEPENSE = 'depense';
    const TYPE_BUDGET  = 'budget';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(name: 'depense_id', type: Types::INTEGER)]
    private int $depenseId;

    #[ORM\Column(type: Types::STRING, length: 20)]
    private string $action;

    /** Type de ressource : depense | budget */
    #[ORM\Column(name: 'type_ressource', type: Types::STRING, length: 20, options: ['default' => 'depense'])]
    private string $typeRessource = self::TYPE_DEPENSE;

    /** Snapshot JSON : montant, description, categorie, modePaiement, date */
    #[ORM\Column(name: 'donnees_avant', type: Types::JSON, nullable: true)]
    private ?array $donneesAvant = null;

    #[ORM\Column(name: 'donnees_apres', type: Types::JSON, nullable: true)]
    private ?array $donneesApres = null;

    #[ORM\Column(name: 'utilisateur_id', type: Types::INTEGER)]
    private int $utilisateurId;

    #[ORM\Column(name: 'date_action', type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $dateAction;

    public function __construct(
        int    $depenseId,
        string $action,
        int    $utilisateurId,
        ?array $donneesAvant = null,
        ?array $donneesApres = null,
        string $typeRessource = self::TYPE_DEPENSE
    ) {
        $this->depenseId     = $depenseId;
        $this->action        = $action;
        $this->utilisateurId = $utilisateurId;
        $this->donneesAvant  = $donneesAvant;
        $this->donneesApres  = $donneesApres;
        $this->typeRessource = $typeRessource;
        $this->dateAction    = new \DateTime();
    }

    public function getId(): ?int                        { return $this->id; }
    public function getDepenseId(): int                  { return $this->depenseId; }
    public function getAction(): string                  { return $this->action; }
    public function getTypeRessource(): string           { return $this->typeRessource; }
    public function getDonneesAvant(): ?array            { return $this->donneesAvant; }
    public function getDonneesApres(): ?array            { return $this->donneesApres; }
    public function getUtilisateurId(): int              { return $this->utilisateurId; }
    public function getDateAction(): \DateTimeInterface  { return $this->dateAction; }
}
