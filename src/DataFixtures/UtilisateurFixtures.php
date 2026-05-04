<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Admin
        $admin = new Utilisateur();
        $admin->setEmail('admin@easybts.fr');
        $admin->setNom('Dupont');
        $admin->setPrenom('Admin');
        $admin->setTelephone('0123456789');
        $admin->setAdresse('123 Rue de l\'Administration');
        $admin->setDepartement('75');
        $admin->setDateCreation(new \DateTime());
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $hashedPassword = $this->passwordHasher->hashPassword($admin, 'Admin123!');
        $admin->setMotDePasse($hashedPassword);

        $manager->persist($admin);
        $this->addReference('admin', $admin);

        // Étudiants de test
        for ($i = 1; $i <= 3; $i++) {
            $user = new Utilisateur();
            $user->setEmail("etudiant{$i}@example.fr");
            $user->setNom("Étudiant{$i}");
            $user->setPrenom("Test");
            $user->setTelephone("06" . str_pad($i, 8, "0", STR_PAD_LEFT));
            $user->setAdresse("{$i} Rue de l'École");
            $user->setDepartement('75');
            $user->setDateCreation(new \DateTime());
            $user->setRoles(['ROLE_USER']);
            $user->setDateNaissance(new \DateTime('2004-' . str_pad($i, 2, '0', STR_PAD_LEFT) . '-15'));
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'Password123!');
            $user->setMotDePasse($hashedPassword);

            $manager->persist($user);
            $this->addReference("etudiant{$i}", $user);
        }

        $manager->flush();
    }
}
