<?php

namespace App\Entity;

use App\Repository\InformationEleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InformationEleveRepository::class)]
class InformationEleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NiveauClasse = null;

    #[ORM\Column(length: 255)]
    private ?string $Sexe = null;

    #[ORM\Column]
    private ?int $NumeroSecuriterSocial = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Date_Entree = null;

    #[ORM\Column(length: 255)]
    private ?string $Nationalite = null;

    #[ORM\Column(length: 255)]
    private ?string $Naissance_Departement = null;

    #[ORM\Column(length: 255)]
    private ?string $Naissance_Commune = null;

    #[ORM\Column]
    private ?bool $Redoublement = null;

    #[ORM\Column]
    private ?bool $Transport = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeTransport = null;

    #[ORM\Column]
    private ?int $NumeroImmatriculationVehicule = null;

    #[ORM\Column(length: 255)]
    private ?string $Specialiter = null;

    #[ORM\Column(length: 255)]
    private ?string $Langues = null;

    #[ORM\Column(length: 255)]
    private ?string $Dernier_Diplome = null;

    #[ORM\Column(length: 255)]
    private ?string $RegimeChoisi = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $DateChoixRegime = null;

    #[ORM\Column]
    private ?bool $Autorisation_Droit_Image = null;

    #[ORM\Column]
    private ?bool $PosibiliteDeChangementFinTrimestre = null;

    #[ORM\Column]
    private ?bool $Acceptation_SMS = null;

    #[ORM\Column]
    private ?bool $AutorisationCommunication = null;

    #[ORM\Column]
    private ?bool $est_majeur = null;

    /**
     * @var Collection<int, Specialisation>
     */
    #[ORM\OneToMany(targetEntity: Specialisation::class, mappedBy: 'informationEleve')]
    private Collection $est_specialisation;

    /**
     * @var Collection<int, AnneeScolaire>
     */
    #[ORM\OneToMany(targetEntity: AnneeScolaire::class, mappedBy: 'informationEleve')]
    private Collection $concernant_annee_scolaire;

    public function __construct()
    {
        $this->est_specialisation = new ArrayCollection();
        $this->concernant_annee_scolaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauClasse(): ?string
    {
        return $this->NiveauClasse;
    }

    public function setNiveauClasse(string $NiveauClasse): static
    {
        $this->NiveauClasse = $NiveauClasse;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): static
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getNumeroSecuriterSocial(): ?int
    {
        return $this->NumeroSecuriterSocial;
    }

    public function setNumeroSecuriterSocial(int $NumeroSecuriterSocial): static
    {
        $this->NumeroSecuriterSocial = $NumeroSecuriterSocial;

        return $this;
    }

    public function getDateEntree(): ?\DateTime
    {
        return $this->Date_Entree;
    }

    public function setDateEntree(\DateTime $Date_Entree): static
    {
        $this->Date_Entree = $Date_Entree;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->Nationalite;
    }

    public function setNationalite(string $Nationalite): static
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    public function getNaissanceDepartement(): ?string
    {
        return $this->Naissance_Departement;
    }

    public function setNaissanceDepartement(string $Naissance_Departement): static
    {
        $this->Naissance_Departement = $Naissance_Departement;

        return $this;
    }

    public function getNaissanceCommune(): ?string
    {
        return $this->Naissance_Commune;
    }

    public function setNaissanceCommune(string $Naissance_Commune): static
    {
        $this->Naissance_Commune = $Naissance_Commune;

        return $this;
    }

    public function isRedoublement(): ?bool
    {
        return $this->Redoublement;
    }

    public function setRedoublement(bool $Redoublement): static
    {
        $this->Redoublement = $Redoublement;

        return $this;
    }

    public function isTransport(): ?bool
    {
        return $this->Transport;
    }

    public function setTransport(bool $Transport): static
    {
        $this->Transport = $Transport;

        return $this;
    }

    public function getTypeTransport(): ?string
    {
        return $this->TypeTransport;
    }

    public function setTypeTransport(string $TypeTransport): static
    {
        $this->TypeTransport = $TypeTransport;

        return $this;
    }

    public function getNumeroImmatriculationVehicule(): ?int
    {
        return $this->NumeroImmatriculationVehicule;
    }

    public function setNumeroImmatriculationVehicule(int $NumeroImmatriculationVehicule): static
    {
        $this->NumeroImmatriculationVehicule = $NumeroImmatriculationVehicule;

        return $this;
    }

    public function getSpecialiter(): ?string
    {
        return $this->Specialiter;
    }

    public function setSpecialiter(string $Specialiter): static
    {
        $this->Specialiter = $Specialiter;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->Langues;
    }

    public function setLangues(string $Langues): static
    {
        $this->Langues = $Langues;

        return $this;
    }

    public function getDernierDiplome(): ?string
    {
        return $this->Dernier_Diplome;
    }

    public function setDernierDiplome(string $Dernier_Diplome): static
    {
        $this->Dernier_Diplome = $Dernier_Diplome;

        return $this;
    }

    public function getRegimeChoisi(): ?string
    {
        return $this->RegimeChoisi;
    }

    public function setRegimeChoisi(string $RegimeChoisi): static
    {
        $this->RegimeChoisi = $RegimeChoisi;

        return $this;
    }

    public function getDateChoixRegime(): ?\DateTime
    {
        return $this->DateChoixRegime;
    }

    public function setDateChoixRegime(\DateTime $DateChoixRegime): static
    {
        $this->DateChoixRegime = $DateChoixRegime;

        return $this;
    }

    public function isAutorisationDroitImage(): ?bool
    {
        return $this->Autorisation_Droit_Image;
    }

    public function setAutorisationDroitImage(bool $Autorisation_Droit_Image): static
    {
        $this->Autorisation_Droit_Image = $Autorisation_Droit_Image;

        return $this;
    }

    public function isPosibiliteDeChangementFinTrimestre(): ?bool
    {
        return $this->PosibiliteDeChangementFinTrimestre;
    }

    public function setPosibiliteDeChangementFinTrimestre(bool $PosibiliteDeChangementFinTrimestre): static
    {
        $this->PosibiliteDeChangementFinTrimestre = $PosibiliteDeChangementFinTrimestre;

        return $this;
    }

    public function isAcceptationSMS(): ?bool
    {
        return $this->Acceptation_SMS;
    }

    public function setAcceptationSMS(bool $Acceptation_SMS): static
    {
        $this->Acceptation_SMS = $Acceptation_SMS;

        return $this;
    }

    public function isAutorisationCommunication(): ?bool
    {
        return $this->AutorisationCommunication;
    }

    public function setAutorisationCommunication(bool $AutorisationCommunication): static
    {
        $this->AutorisationCommunication = $AutorisationCommunication;

        return $this;
    }

    public function isEstMajeur(): ?bool
    {
        return $this->est_majeur;
    }

    public function setEstMajeur(bool $est_majeur): static
    {
        $this->est_majeur = $est_majeur;

        return $this;
    }

    /**
     * @return Collection<int, Specialisation>
     */
    public function getEstSpecialisation(): Collection
    {
        return $this->est_specialisation;
    }

    public function addEstSpecialisation(Specialisation $estSpecialisation): static
    {
        if (!$this->est_specialisation->contains($estSpecialisation)) {
            $this->est_specialisation->add($estSpecialisation);
            $estSpecialisation->setInformationEleve($this);
        }

        return $this;
    }

    public function removeEstSpecialisation(Specialisation $estSpecialisation): static
    {
        if ($this->est_specialisation->removeElement($estSpecialisation)) {
            // set the owning side to null (unless already changed)
            if ($estSpecialisation->getInformationEleve() === $this) {
                $estSpecialisation->setInformationEleve(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AnneeScolaire>
     */
    public function getConcernantAnneeScolaire(): Collection
    {
        return $this->concernant_annee_scolaire;
    }

    public function addConcernantAnneeScolaire(AnneeScolaire $concernantAnneeScolaire): static
    {
        if (!$this->concernant_annee_scolaire->contains($concernantAnneeScolaire)) {
            $this->concernant_annee_scolaire->add($concernantAnneeScolaire);
            $concernantAnneeScolaire->setInformationEleve($this);
        }

        return $this;
    }

    public function removeConcernantAnneeScolaire(AnneeScolaire $concernantAnneeScolaire): static
    {
        if ($this->concernant_annee_scolaire->removeElement($concernantAnneeScolaire)) {
            // set the owning side to null (unless already changed)
            if ($concernantAnneeScolaire->getInformationEleve() === $this) {
                $concernantAnneeScolaire->setInformationEleve(null);
            }
        }

        return $this;
    }
}
