<?php

namespace App\Tests\Entity;

use App\Entity\Utilisateur;
use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase
{
    public function testCreateUtilisateur(): void
    {
        $user = new Utilisateur();
        $user->setEmail('test@example.com');
        $user->setNom('Dupont');
        $user->setPrenom('Jean');
        $user->setRoles(['ROLE_USER']);
        
        $this->assertEquals('test@example.com', $user->getEmail());
        $this->assertEquals('Dupont', $user->getNom());
        $this->assertEquals('Jean', $user->getPrenom());
        $this->assertEquals(['ROLE_USER'], $user->getRoles());
    }
    
    public function testUserIdentifier(): void
    {
        $user = new Utilisateur();
        $user->setEmail('user@test.fr');
        
        $this->assertEquals('user@test.fr', $user->getUserIdentifier());
    }
    
    public function testRolesAlwaysContainRoleUser(): void
    {
        $user = new Utilisateur();
        $user->setRoles([]);
        
        $roles = $user->getRoles();
        $this->assertContains('ROLE_USER', $roles);
    }
    
    public function testRolesAreUnique(): void
    {
        $user = new Utilisateur();
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN', 'ROLE_USER']);
        
        $roles = $user->getRoles();
        $this->assertCount(2, $roles);
        $this->assertContains('ROLE_USER', $roles);
        $this->assertContains('ROLE_ADMIN', $roles);
    }
}
