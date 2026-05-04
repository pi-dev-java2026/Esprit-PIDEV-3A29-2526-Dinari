<?php

namespace App\EventListener;

use App\Entity\Budget;
use App\Entity\Depense;
use App\Entity\HistoriqueDepense;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PostUpdateEventArgs;

#[AsDoctrineListener(event: Events::postPersist)]
#[AsDoctrineListener(event: Events::preUpdate)]
#[AsDoctrineListener(event: Events::postUpdate)]
#[AsDoctrineListener(event: Events::preRemove)]
class DepenseHistoriqueListener
{
    /**
     * Temporary store for "avant" snapshots keyed by spl_object_id.
     * Populated in preUpdate, consumed in postUpdate.
     *
     * @var array<int, array{type: string, avant: array<string, mixed>, userId: int}>
     */
    private array $pendingUpdates = [];

    // ── Snapshots ────────────────────────────────────────────────────────────

    /** @return array<string, mixed> */
    private function snapshotDepense(Depense $d): array
    {
        return [
            'montant'      => $d->getMontant(),
            'description'  => $d->getDescription(),
            'date'         => $d->getDateDepense()->format('d/m/Y'),
            'categorie'    => $d->getCategorie()?->getLabel(),
            'modePaiement' => $d->getModePaiement()?->getLabel(),
        ];
    }

    /** @return array<string, mixed> */
    private function snapshotBudget(Budget $b): array
    {
        /** @var array<int, string> $mois */
        $mois = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre',
        ];
        return [
            'montantLimite' => $b->getMontantLimite(),
            'mois'          => ($mois[$b->getMois()] ?? (string) $b->getMois()) . ' ' . $b->getAnnee(),
        ];
    }

    // ── postPersist — création ────────────────────────────────────────────────

    /** @param LifecycleEventArgs<EntityManagerInterface> $args */
    public function postPersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        $em     = $args->getObjectManager();

        if ($entity instanceof Depense) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_CREE,
                $entity->getUtilisateurId() ?? 1,
                null,
                $this->snapshotDepense($entity),
                HistoriqueDepense::TYPE_DEPENSE
            ));
            $em->flush();
        }

        if ($entity instanceof Budget) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_CREE,
                $entity->getUtilisateurId() ?? 1,
                null,
                $this->snapshotBudget($entity),
                HistoriqueDepense::TYPE_BUDGET
            ));
            $em->flush();
        }
    }

    // ── preUpdate — capture l'état AVANT ─────────────────────────────────────

    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity    = $args->getObject();
        $changeSet = $args->getEntityChangeSet();

        if ($entity instanceof Depense) {
            $avant = $this->snapshotDepense($entity);
            /** @var array<string, string> $fieldMap */
            $fieldMap = [
                'montant'      => 'montant',
                'description'  => 'description',
                'dateDepense'  => 'date',
                'categorie'    => 'categorie',
                'modePaiement' => 'modePaiement',
            ];
            foreach ($changeSet as $field => $values) {
                $old = $values[0];
                if (!isset($fieldMap[$field])) {
                    continue;
                }
                $key = $fieldMap[$field];
                if ($old instanceof \DateTimeInterface) {
                    $avant[$key] = $old->format('d/m/Y');
                } elseif (is_object($old) && method_exists($old, 'getLabel')) {
                    $avant[$key] = $old->getLabel();
                } else {
                    $avant[$key] = $old;
                }
            }
            $this->pendingUpdates[spl_object_id($entity)] = [
                'type'   => HistoriqueDepense::TYPE_DEPENSE,
                'avant'  => $avant,
                'userId' => $entity->getUtilisateurId() ?? 1,
            ];
        }

        if ($entity instanceof Budget) {
            $avant = $this->snapshotBudget($entity);
            foreach ($changeSet as $field => $values) {
                $old = $values[0];
                if ($field === 'montantLimite') {
                    $avant['montantLimite'] = $old;
                }
                if ($field === 'mois') {
                    $avant['mois'] = $old . '/' . $entity->getAnnee();
                }
                if ($field === 'annee') {
                    $avant['mois'] = $entity->getMois() . '/' . $old;
                }
            }
            $this->pendingUpdates[spl_object_id($entity)] = [
                'type'   => HistoriqueDepense::TYPE_BUDGET,
                'avant'  => $avant,
                'userId' => $entity->getUtilisateurId() ?? 1,
            ];
        }
    }

    // ── postUpdate — persiste l'historique après le flush ────────────────────

    public function postUpdate(PostUpdateEventArgs $args): void
    {
        $entity = $args->getObject();
        $oid    = spl_object_id($entity);

        if (!isset($this->pendingUpdates[$oid])) {
            return;
        }

        $pending = $this->pendingUpdates[$oid];
        unset($this->pendingUpdates[$oid]);

        $em = $args->getObjectManager();

        if ($entity instanceof Depense) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_MODIFIE,
                $pending['userId'],
                $pending['avant'],
                $this->snapshotDepense($entity),
                HistoriqueDepense::TYPE_DEPENSE
            ));
            $em->flush();
        }

        if ($entity instanceof Budget) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_MODIFIE,
                $pending['userId'],
                $pending['avant'],
                $this->snapshotBudget($entity),
                HistoriqueDepense::TYPE_BUDGET
            ));
            $em->flush();
        }
    }

    // ── preRemove — capture avant suppression ────────────────────────────────

    /** @param LifecycleEventArgs<EntityManagerInterface> $args */
    public function preRemove(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        $em     = $args->getObjectManager();

        if ($entity instanceof Depense) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_SUPPRIME,
                $entity->getUtilisateurId() ?? 1,
                $this->snapshotDepense($entity),
                null,
                HistoriqueDepense::TYPE_DEPENSE
            ));
        }

        if ($entity instanceof Budget) {
            $em->persist(new HistoriqueDepense(
                (int) $entity->getId(),
                HistoriqueDepense::ACTION_SUPPRIME,
                $entity->getUtilisateurId() ?? 1,
                $this->snapshotBudget($entity),
                null,
                HistoriqueDepense::TYPE_BUDGET
            ));
        }
    }
}
