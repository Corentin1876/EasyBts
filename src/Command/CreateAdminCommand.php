<?php

namespace App\Command;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Crée un compte administrateur par défaut',
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        // Vérifier si l'admin existe déjà
        $existingAdmin = $this->entityManager->getRepository(Utilisateur::class)
            ->findOneBy(['email' => 'admin@easybts.fr']);

        if ($existingAdmin) {
            $io->warning('Un compte admin existe déjà avec l\'email admin@easybts.fr');
            return Command::FAILURE;
        }

        // Créer le compte admin
        $admin = new Utilisateur();
        $admin->setEmail('admin@easybts.fr');
        $admin->setNom('Administrateur');
        $admin->setPrenom('Système');
        $admin->setUser('mr');
        $admin->setDateCreation(new \DateTime());
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);

        // Mot de passe par défaut : Admin123!
        $hashedPassword = $this->passwordHasher->hashPassword($admin, 'Admin123!');
        $admin->setMotDePasse($hashedPassword);

        $this->entityManager->persist($admin);
        $this->entityManager->flush();

        $io->success('Compte administrateur créé avec succès !');
        $io->table(
            ['Information', 'Valeur'],
            [
                ['Email', 'admin@easybts.fr'],
                ['Mot de passe', 'Admin123!'],
                ['Rôle', 'ROLE_ADMIN'],
            ]
        );
        $io->warning('⚠️  Pensez à changer le mot de passe après la première connexion !');

        return Command::SUCCESS;
    }
}
