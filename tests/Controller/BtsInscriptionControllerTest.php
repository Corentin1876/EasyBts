<?php

namespace App\Tests\Controller;

use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class BtsInscriptionControllerTest extends WebTestCase
{
    public function testBtsListeRequiresAuthentication(): void
    {
        $client = static::createClient();
        $client->request('GET', '/bts');
        
        $this->assertResponseRedirects('/connexion');
    }
    
    public function testAuthenticatedUserCanAccessBtsListe(): void
    {
        $client = static::createClient();
        
        // Créer un utilisateur de test
        $container = static::getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        $passwordHasher = $container->get(UserPasswordHasherInterface::class);
        
        $user = new Utilisateur();
        $user->setEmail('test@bts.fr');
        $user->setNom('Test');
        $user->setPrenom('User');
        $user->setPassword($passwordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
        
        $entityManager->persist($user);
        $entityManager->flush();
        
        // Simuler la connexion
        $client->loginUser($user);
        
        $client->request('GET', '/bts');
        
        $this->assertResponseIsSuccessful();
        
        // Nettoyer
        $entityManager->remove($user);
        $entityManager->flush();
    }
    
    public function testMesDossiersRequiresAuthentication(): void
    {
        $client = static::createClient();
        $client->request('GET', '/mes-dossiers');
        
        $this->assertResponseRedirects('/connexion');
    }
    
    public function testAuthenticatedUserCanAccessMesDossiers(): void
    {
        $client = static::createClient();
        
        $container = static::getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        $passwordHasher = $container->get(UserPasswordHasherInterface::class);
        
        $user = new Utilisateur();
        $user->setEmail('test2@bts.fr');
        $user->setNom('Test');
        $user->setPrenom('User');
        $user->setPassword($passwordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
        
        $entityManager->persist($user);
        $entityManager->flush();
        
        $client->loginUser($user);
        
        $client->request('GET', '/mes-dossiers');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Mes dossiers');
        
        // Nettoyer
        $entityManager->remove($user);
        $entityManager->flush();
    }
}
