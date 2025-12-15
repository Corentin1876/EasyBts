<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testHomePageIsSuccessful(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Plateforme nationale d\'inscription');
    }
    
    public function testHomePageContainsNavigationLinks(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $this->assertResponseIsSuccessful();
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Accueil")')->count());
        $this->assertGreaterThan(0, $crawler->filter('a:contains("Contact")')->count());
    }
    
    public function testFaqPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/faq');
        
        $this->assertResponseIsSuccessful();
    }
    
    public function testContactPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/contact');
        
        $this->assertResponseIsSuccessful();
    }
    
    public function testMentionsLegalesPageIsAccessible(): void
    {
        $client = static::createClient();
        $client->request('GET', '/mentions-legales');
        
        $this->assertResponseIsSuccessful();
    }
}
