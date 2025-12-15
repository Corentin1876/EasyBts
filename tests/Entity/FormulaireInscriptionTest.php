<?php

namespace App\Tests\Entity;

use App\Entity\FormulaireInscription;
use App\Entity\Utilisateur;
use PHPUnit\Framework\TestCase;

class FormulaireInscriptionTest extends TestCase
{
    public function testCreateFormulaireInscription(): void
    {
        $formulaire = new FormulaireInscription();
        $formulaire->setTypeFormulaire('BTS - Comptabilité et Gestion (CG)');
        $formulaire->setStatut('brouillon');
        $formulaire->setDraftJson('{"nom":"Test"}');
        
        $this->assertEquals('BTS - Comptabilité et Gestion (CG)', $formulaire->getTypeFormulaire());
        $this->assertEquals('brouillon', $formulaire->getStatut());
        $this->assertEquals('{"nom":"Test"}', $formulaire->getDraftJson());
    }
    
    public function testFormulaireWithUser(): void
    {
        $user = new Utilisateur();
        $user->setEmail('test@test.fr');
        $user->setNom('Test');
        
        $formulaire = new FormulaireInscription();
        $formulaire->setRemplitFormulaire($user);
        
        $this->assertSame($user, $formulaire->getRemplitFormulaire());
        $this->assertEquals('test@test.fr', $formulaire->getRemplitFormulaire()->getEmail());
    }
    
    public function testDateSoumission(): void
    {
        $formulaire = new FormulaireInscription();
        $date = new \DateTime('2025-12-15 10:30:00');
        $formulaire->setDateSoumission($date);
        
        $this->assertEquals($date, $formulaire->getDateSoumission());
        $this->assertEquals('2025-12-15', $formulaire->getDateSoumission()->format('Y-m-d'));
    }
    
    public function testStatutValues(): void
    {
        $formulaire = new FormulaireInscription();
        
        $validStatuts = ['brouillon', 'soumis', 'en_attente', 'validé', 'rejeté'];
        
        foreach ($validStatuts as $statut) {
            $formulaire->setStatut($statut);
            $this->assertEquals($statut, $formulaire->getStatut());
        }
    }
}
