<?php

namespace App\Twig;

use App\Entity\Utilisateur;
use App\Entity\FormulaireInscription;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('has_validated_dossier', [$this, 'hasValidatedDossier']),
        ];
    }

    public function hasValidatedDossier(?Utilisateur $user): bool
    {
        if (!$user) {
            return false;
        }

        // Chercher directement avec une requête DQL
        $qb = $this->entityManager->createQueryBuilder();
        $result = $qb->select('COUNT(f.id)')
            ->from(FormulaireInscription::class, 'f')
            ->where('f.remplit_formulaire = :user')
            ->andWhere('f.statut = :statut')
            ->setParameter('user', $user)
            ->setParameter('statut', 'validé')
            ->getQuery()
            ->getSingleScalarResult();

        return $result > 0;
    }
}
