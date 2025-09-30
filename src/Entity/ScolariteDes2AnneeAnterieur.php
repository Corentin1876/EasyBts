<?php

namespace App\Entity;

use App\Repository\ScolariteDes2AnneeAnterieurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScolariteDes2AnneeAnterieurRepository::class)]
class ScolariteDes2AnneeAnterieur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Classe = null;

    #[ORM\Column(length: 255)]
    private ?string $LangueLV1 = null;

    #[ORM\Column(length: 255)]
    private ?string $LangueLV2 = null;

    #[ORM\Column(length: 255)]
    private ?string $Option_Matiere = null;

    #[ORM\Column(length: 255)]
    private ?string $Etablisement = null;

    #[ORM\ManyToOne(inversedBy: 'a_scolarite_anterieure')]
    private ?FormulaireInscription $formulaireInscription = null;

    /**
     * @var Collection<int, AnneeScolaire>
     */
    #[ORM\OneToMany(targetEntity: AnneeScolaire::class, mappedBy: 'scolariteDes2AnneeAnterieur')]
    private Collection $concerne_annee_scolaire;

    public function __construct()
    {
        $this->concerne_annee_scolaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?string
    {
        return $this->Classe;
    }

    public function setClasse(string $Classe): static
    {
        $this->Classe = $Classe;

        return $this;
    }

    public function getLangueLV1(): ?string
    {
        return $this->LangueLV1;
    }

    public function setLangueLV1(string $LangueLV1): static
    {
        $this->LangueLV1 = $LangueLV1;

        return $this;
    }

    public function getLangueLV2(): ?string
    {
        return $this->LangueLV2;
    }

    public function setLangueLV2(string $LangueLV2): static
    {
        $this->LangueLV2 = $LangueLV2;

        return $this;
    }

    public function getOptionMatiere(): ?string
    {
        return $this->Option_Matiere;
    }

    public function setOptionMatiere(string $Option_Matiere): static
    {
        $this->Option_Matiere = $Option_Matiere;

        return $this;
    }

    public function getEtablisement(): ?string
    {
        return $this->Etablisement;
    }

    public function setEtablisement(string $Etablisement): static
    {
        $this->Etablisement = $Etablisement;

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

    /**
     * @return Collection<int, AnneeScolaire>
     */
    public function getConcerneAnneeScolaire(): Collection
    {
        return $this->concerne_annee_scolaire;
    }

    public function addConcerneAnneeScolaire(AnneeScolaire $concerneAnneeScolaire): static
    {
        if (!$this->concerne_annee_scolaire->contains($concerneAnneeScolaire)) {
            $this->concerne_annee_scolaire->add($concerneAnneeScolaire);
            $concerneAnneeScolaire->setScolariteDes2AnneeAnterieur($this);
        }

        return $this;
    }

    public function removeConcerneAnneeScolaire(AnneeScolaire $concerneAnneeScolaire): static
    {
        if ($this->concerne_annee_scolaire->removeElement($concerneAnneeScolaire)) {
            // set the owning side to null (unless already changed)
            if ($concerneAnneeScolaire->getScolariteDes2AnneeAnterieur() === $this) {
                $concerneAnneeScolaire->setScolariteDes2AnneeAnterieur(null);
            }
        }

        return $this;
    }
}
