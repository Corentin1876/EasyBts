<?php

namespace App\Command;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:fix-user-roles',
    description: 'Fix users without roles initialized',
)]
class FixUserRolesCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $users = $this->entityManager->getRepository(Utilisateur::class)->findAll();
        $fixed = 0;

        foreach ($users as $user) {
            $roles = $user->getRoles();
            if (empty($roles) || !in_array('ROLE_USER', $roles)) {
                $user->setRoles(['ROLE_USER']);
                $fixed++;
            }
        }

        if ($fixed > 0) {
            $this->entityManager->flush();
            $io->success(sprintf('%d utilisateur(s) corrigé(s)', $fixed));
        } else {
            $io->info('Tous les utilisateurs ont déjà des rôles valides');
        }

        return Command::SUCCESS;
    }
}
