<?php

namespace App\Entity;

use App\Repository\ResponsableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResponsableRepository::class)]
class Responsable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $CodePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $tellephone = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Employeur = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_Employeur = null;

    #[ORM\Column(length: 255)]
    private ?string $lien_avec_eleve = null;

    #[ORM\Column]
    private ?bool $Autorisation_Communication = null;

    #[ORM\Column(length: 255)]
    private ?string $Tell_Domicile = null;

    #[ORM\Column(length: 255)]
    private ?string $Tell_Travail = null;

    #[ORM\Column(length: 255)]
    private ?string $Tell_Mobile = null;

    #[ORM\Column]
    private ?bool $Acceptation_SMS = null;

    #[ORM\ManyToOne(inversedBy: 'responsable_de')]
    private ?FormulaireInscription $formulaireInscription = null;

    /**
     * @var Collection<int, TypeResponsable>
     */
    #[ORM\OneToMany(targetEntity: TypeResponsable::class, mappedBy: 'responsable')]
    private Collection $a_type_responsabilite;

    public function __construct()
    {
        $this->a_type_responsabilite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->CodePostal;
    }

    public function setCodePostal(string $CodePostal): static
    {
        $this->CodePostal = $CodePostal;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTellephone(): ?string
    {
        return $this->tellephone;
    }

    public function setTellephone(string $tellephone): static
    {
        $this->tellephone = $tellephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->Nom_Employeur;
    }

    public function setNomEmployeur(string $Nom_Employeur): static
    {
        $this->Nom_Employeur = $Nom_Employeur;

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->Adresse_Employeur;
    }

    public function setAdresseEmployeur(string $Adresse_Employeur): static
    {
        $this->Adresse_Employeur = $Adresse_Employeur;

        return $this;
    }

    public function getLienAvecEleve(): ?string
    {
        return $this->lien_avec_eleve;
    }

    public function setLienAvecEleve(string $lien_avec_eleve): static
    {
        $this->lien_avec_eleve = $lien_avec_eleve;

        return $this;
    }

    public function isAutorisationCommunication(): ?bool
    {
        return $this->Autorisation_Communication;
    }

    public function setAutorisationCommunication(bool $Autorisation_Communication): static
    {
        $this->Autorisation_Communication = $Autorisation_Communication;

        return $this;
    }

    public function getTellDomicile(): ?string
    {
        return $this->Tell_Domicile;
    }

    public function setTellDomicile(string $Tell_Domicile): static
    {
        $this->Tell_Domicile = $Tell_Domicile;

        return $this;
    }

    public function getTellTravail(): ?string
    {
        return $this->Tell_Travail;
    }

    public function setTellTravail(string $Tell_Travail): static
    {
        $this->Tell_Travail = $Tell_Travail;

        return $this;
    }

    public function getTellMobile(): ?string
    {
        return $this->Tell_Mobile;
    }

    public function setTellMobile(string $Tell_Mobile): static
    {
        $this->Tell_Mobile = $Tell_Mobile;

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
     * @return Collection<int, TypeResponsable>
     */
    public function getATypeResponsabilite(): Collection
    {
        return $this->a_type_responsabilite;
    }

    public function addATypeResponsabilite(TypeResponsable $aTypeResponsabilite): static
    {
        if (!$this->a_type_responsabilite->contains($aTypeResponsabilite)) {
            $this->a_type_responsabilite->add($aTypeResponsabilite);
            $aTypeResponsabilite->setResponsable($this);
        }

        return $this;
    }

    public function removeATypeResponsabilite(TypeResponsable $aTypeResponsabilite): static
    {
        if ($this->a_type_responsabilite->removeElement($aTypeResponsabilite)) {
            // set the owning side to null (unless already changed)
            if ($aTypeResponsabilite->getResponsable() === $this) {
                $aTypeResponsabilite->setResponsable(null);
            }
        }

        return $this;
    }
}
