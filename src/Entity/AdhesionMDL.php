<?php

namespace App\Entity;

use App\Repository\AdhesionMDLRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdhesionMDLRepository::class)]
class AdhesionMDL
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Montant_Adhesion = null;

    #[ORM\Column(length: 255)]
    private ?string $Mode_Reglement = null;

    #[ORM\ManyToOne(inversedBy: 'inclut_adhesion_mdl')]
    private ?FormulaireInscription $formulaireInscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantAdhesion(): ?int
    {
        return $this->Montant_Adhesion;
    }

    public function setMontantAdhesion(int $Montant_Adhesion): static
    {
        $this->Montant_Adhesion = $Montant_Adhesion;

        return $this;
    }

    public function getModeReglement(): ?string
    {
        return $this->Mode_Reglement;
    }

    public function setModeReglement(string $Mode_Reglement): static
    {
        $this->Mode_Reglement = $Mode_Reglement;

        return $this;
    }

    public function getFormulaireInscription(): ?FormulaireInscription
    {
        return $this->formulaireInscription;
    }

    public function setFormulaireInscription(?FormulaireInscription $formulaireInscription): static
    {
        $this->formulaireInscription = $formulaireInscription;

        return $this;
    }
}
