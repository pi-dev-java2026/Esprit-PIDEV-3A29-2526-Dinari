<?php

namespace App\Entity;

use App\Repository\HistoriqueDepenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Audit log for Depense and Budget mutations.
 *
 * Design note — why depense_id is stored as a plain integer:
 *   This entity is a POLYMORPHIC audit log. The column `depense_id` stores
 *   the primary key of EITHER a Depense OR a Budget row, discriminated by
 *   `type_ressource`. A real ManyToOne FK would only work for one target
 *   table and would break referential integrity for the other. Storing the
 *   ID as a plain integer is therefore intentional and correct here.
 *
 *   Similarly, `utilisateur_id` is stored as a plain integer because no
 *   User entity exists in this project yet (auth is hardcoded to userId=1).
 *   Both fields will be converted to proper associations once a User entity
 *   is introduced.
 */
#[ORM\Entity(repositoryClass: HistoriqueDepenseRepository::class)]
#[ORM\Table(name: 'historique_depense')]
class HistoriqueDepense
{
    public const ACTION_CREE     = 'CRÉÉ';
    public const ACTION_MODIFIE  = 'MODIFIÉ';
    public const ACTION_SUPPRIME = 'SUPPRIMÉ';

    public const TYPE_DEPENSE = 'depense';
    public const TYPE_BUDGET  = 'budget';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    /**
     * Polymorphic resource ID: references depense.id_depense when
     * type_ressource = 'depense', or budget.id when type_ressource = 'budget'.
     * Intentionally stored as a plain integer — see class docblock.
     */
    #[ORM\Column(name: 'depense_id', type: Types::INTEGER)]
    private int $depenseId;

    #[ORM\Column(type: Types::STRING, length: 20)]
    private string $action;

    /** Type de ressource : depense | budget */
    #[ORM\Column(name: 'type_ressource', type: Types::STRING, length: 20, options: ['default' => 'depense'])]
    private string $typeRessource = self::TYPE_DEPENSE;

    /** Snapshot JSON avant modification/suppression */
    #[ORM\Column(name: 'donnees_avant', type: Types::JSON, nullable: true)]
    private ?array $donneesAvant = null;

    /** Snapshot JSON après création/modification */
    #[ORM\Column(name: 'donnees_apres', type: Types::JSON, nullable: true)]
    private ?array $donneesApres = null;

    /**
     * Plain integer — no User entity exists yet. See class docblock.
     */
    #[ORM\Column(name: 'utilisateur_id', type: Types::INTEGER)]
    private int $utilisateurId;

    #[ORM\Column(name: 'date_action', type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $dateAction;

    public function __construct(
        int    $depenseId,
        string $action,
        int    $utilisateurId,
        ?array $donneesAvant  = null,
        ?array $donneesApres  = null,
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

    public function getId(): ?int                       { return $this->id; }
    public function getDepenseId(): int                 { return $this->depenseId; }
    public function getAction(): string                 { return $this->action; }
    public function getTypeRessource(): string          { return $this->typeRessource; }
    public function getDonneesAvant(): ?array           { return $this->donneesAvant; }
    public function getDonneesApres(): ?array           { return $this->donneesApres; }
    public function getUtilisateurId(): int             { return $this->utilisateurId; }
    public function getDateAction(): \DateTimeInterface { return $this->dateAction; }
}
