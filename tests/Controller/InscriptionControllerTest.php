<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionControllerTest extends WebTestCase
{
    public function testInscriptionPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/inscription');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Créer un compte');
    }
    
    public function testInscriptionFormHasRequiredFields(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');
        
        $this->assertResponseIsSuccessful();
        
        // Vérifier la présence des champs requis
        $form = $crawler->selectButton('Créer mon compte')->form();
        $this->assertTrue($form->has('inscription[email]'));
        $this->assertTrue($form->has('inscription[nom]'));
        $this->assertTrue($form->has('inscription[prenom]'));
        $this->assertTrue($form->has('inscription[plainPassword][first]'));
        $this->assertTrue($form->has('inscription[plainPassword][second]'));
    }
    
    public function testInscriptionWithInvalidEmail(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');
        
        $form = $crawler->selectButton('Créer mon compte')->form([
            'inscription[email]' => 'invalid-email',
            'inscription[nom]' => 'Test',
            'inscription[prenom]' => 'User',
            'inscription[plainPassword][first]' => 'Password123!',
            'inscription[plainPassword][second]' => 'Password123!',
            'inscription[agreeTerms]' => true,
        ]);
        
        $client->submit($form);
        
        $this->assertResponseStatusCodeSame(422);
    }
    
    public function testInscriptionWithMismatchedPasswords(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/inscription');
        
        $form = $crawler->selectButton('Créer mon compte')->form([
            'inscription[email]' => 'test@example.com',
            'inscription[nom]' => 'Test',
            'inscription[prenom]' => 'User',
            'inscription[plainPassword][first]' => 'Password123!',
            'inscription[plainPassword][second]' => 'DifferentPassword123!',
            'inscription[agreeTerms]' => true,
        ]);
        
        $client->submit($form);
        
        $this->assertResponseStatusCodeSame(422);
    }
}
