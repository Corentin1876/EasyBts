<?php

namespace App\Repository;

use App\Entity\PasswordResetToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PasswordResetToken>
 */
class PasswordResetTokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasswordResetToken::class);
    }

    public function findValidToken(string $token): ?PasswordResetToken
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.token = :token')
            ->andWhere('p.used = :used')
            ->andWhere('p.expiresAt > :now')
            ->setParameter('token', $token)
            ->setParameter('used', false)
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function deleteExpiredTokens(): void
    {
        $this->createQueryBuilder('p')
            ->delete()
            ->where('p.expiresAt < :now')
            ->orWhere('p.used = :used')
            ->setParameter('now', new \DateTime('-7 days'))
            ->setParameter('used', true)
            ->getQuery()
            ->execute();
    }
}
