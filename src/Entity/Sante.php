<?php

namespace App\Entity;

use App\Repository\SanteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SanteRepository::class)]
class Sante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Date_Dernier_Rappel_Vaccin_Antitetanique = null;

    #[ORM\Column(length: 255)]
    private ?string $ObservationParticuliere = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $Tel_MedecinTraitant = null;

    #[ORM\ManyToOne(inversedBy: 'a_informations_sante')]
    private ?FormulaireInscription $formulaireInscription = null;

    /**
     * @var Collection<int, Medecin>
     */
    #[ORM\OneToMany(targetEntity: Medecin::class, mappedBy: 'sante')]
    private Collection $suivi_par_medecin;

    public function __construct()
    {
        $this->suivi_par_medecin = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDernierRappelVaccinAntitetanique(): ?\DateTime
    {
        return $this->Date_Dernier_Rappel_Vaccin_Antitetanique;
    }

    public function setDateDernierRappelVaccinAntitetanique(\DateTime $Date_Dernier_Rappel_Vaccin_Antitetanique): static
    {
        $this->Date_Dernier_Rappel_Vaccin_Antitetanique = $Date_Dernier_Rappel_Vaccin_Antitetanique;

        return $this;
    }

    public function getObservationParticuliere(): ?string
    {
        return $this->ObservationParticuliere;
    }

    public function setObservationParticuliere(string $ObservationParticuliere): static
    {
        $this->ObservationParticuliere = $ObservationParticuliere;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelMedecinTraitant(): ?string
    {
        return $this->Tel_MedecinTraitant;
    }

    public function setTelMedecinTraitant(string $Tel_MedecinTraitant): static
    {
        $this->Tel_MedecinTraitant = $Tel_MedecinTraitant;

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
     * @return Collection<int, Medecin>
     */
    public function getSuiviParMedecin(): Collection
    {
        return $this->suivi_par_medecin;
    }

    public function addSuiviParMedecin(Medecin $suiviParMedecin): static
    {
        if (!$this->suivi_par_medecin->contains($suiviParMedecin)) {
            $this->suivi_par_medecin->add($suiviParMedecin);
            $suiviParMedecin->setSante($this);
        }

        return $this;
    }

    public function removeSuiviParMedecin(Medecin $suiviParMedecin): static
    {
        if ($this->suivi_par_medecin->removeElement($suiviParMedecin)) {
            // set the owning side to null (unless already changed)
            if ($suiviParMedecin->getSante() === $this) {
                $suiviParMedecin->setSante(null);
            }
        }

        return $this;
    }
}
