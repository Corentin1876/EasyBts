<?php

namespace App\Tests\Service;

use App\Entity\FormulaireInscription;
use App\Service\FormulaireStatutService;
use PHPUnit\Framework\TestCase;

class FormulaireStatutServiceTest extends TestCase
{
    private FormulaireStatutService $service;
    
    protected function setUp(): void
    {
        $this->service = new FormulaireStatutService();
    }
    
    public function testIsValide(): void
    {
        $formulaire = new FormulaireInscription();
        $formulaire->setStatut('validé');
        
        $this->assertTrue($this->service->isValide($formulaire));
    }
    
    public function testIsNotValide(): void
    {
        $formulaire = new FormulaireInscription();
        $formulaire->setStatut('brouillon');
        
        $this->assertFalse($this->service->isValide($formulaire));
    }
    
    public function testIsBrouillon(): void
    {
        $formulaire = new FormulaireInscription();
        $formulaire->setStatut('brouillon');
        
        $this->assertTrue($this->service->isBrouillon($formulaire));
    }
    
    public function testGetStatutLabel(): void
    {
        $this->assertEquals('✅ Validé', $this->service->getStatutLabel('validé'));
        $this->assertEquals('📝 Brouillon', $this->service->getStatutLabel('brouillon'));
        $this->assertEquals('📤 Soumis', $this->service->getStatutLabel('soumis'));
    }
    
    public function testGetStatutBadgeClass(): void
    {
        $this->assertEquals('fr-badge--success', $this->service->getStatutBadgeClass('validé'));
        $this->assertEquals('fr-badge--info', $this->service->getStatutBadgeClass('brouillon'));
        $this->assertEquals('fr-badge--new', $this->service->getStatutBadgeClass('soumis'));
    }
    
    public function testIsModifiable(): void
    {
        $brouillon = new FormulaireInscription();
        $brouillon->setStatut('brouillon');
        
        $valide = new FormulaireInscription();
        $valide->setStatut('validé');
        
        $this->assertTrue($this->service->isModifiable($brouillon));
        $this->assertFalse($this->service->isModifiable($valide));
    }
    
    public function testCanDownloadPdf(): void
    {
        $valide = new FormulaireInscription();
        $valide->setStatut('validé');
        
        $brouillon = new FormulaireInscription();
        $brouillon->setStatut('brouillon');
        
        $this->assertTrue($this->service->canDownloadPdf($valide));
        $this->assertFalse($this->service->canDownloadPdf($brouillon));
    }
}
