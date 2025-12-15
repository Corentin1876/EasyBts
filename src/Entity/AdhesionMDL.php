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

    #[ORM\Column(nullable: true)]
    private ?int $Montant_Adhesion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Mode_Reglement = null;

    #[ORM\ManyToOne(inversedBy: 'inclut_adhesion_mdl')]
    private ?FormulaireInscription $formulaireInscription = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classe = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email_etudiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_responsable = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresse_responsable = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $type_paiement = null;

    #[ORM\Column(nullable: true)]
    private ?bool $autorisation_droit_image = false;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo_individuelle = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statut = 'brouillon';

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $date_creation = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTime $date_soumission = null;

    public function __construct()
    {
        $this->date_creation = new \DateTime();
        $this->statut = 'brouillon';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantAdhesion(): ?int
    {
        return $this->Montant_Adhesion;
    }

    public function setMontantAdhesion(?int $Montant_Adhesion): static
    {
        $this->Montant_Adhesion = $Montant_Adhesion;
        return $this;
    }

    public function getModeReglement(): ?string
    {
        return $this->Mode_Reglement;
    }

    public function setModeReglement(?string $Mode_Reglement): static
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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): static
    {
        $this->classe = $classe;
        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;
        return $this;
    }

    public function getEmailEtudiant(): ?string
    {
        return $this->email_etudiant;
    }

    public function setEmailEtudiant(?string $email_etudiant): static
    {
        $this->email_etudiant = $email_etudiant;
        return $this;
    }

    public function getNomResponsable(): ?string
    {
        return $this->nom_responsable;
    }

    public function setNomResponsable(?string $nom_responsable): static
    {
        $this->nom_responsable = $nom_responsable;
        return $this;
    }

    public function getAdresseResponsable(): ?string
    {
        return $this->adresse_responsable;
    }

    public function setAdresseResponsable(?string $adresse_responsable): static
    {
        $this->adresse_responsable = $adresse_responsable;
        return $this;
    }

    public function getTypePaiement(): ?string
    {
        return $this->type_paiement;
    }

    public function setTypePaiement(?string $type_paiement): static
    {
        $this->type_paiement = $type_paiement;
        return $this;
    }

    public function isAutorisationDroitImage(): ?bool
    {
        return $this->autorisation_droit_image;
    }

    public function setAutorisationDroitImage(?bool $autorisation_droit_image): static
    {
        $this->autorisation_droit_image = $autorisation_droit_image;
        return $this;
    }

    public function getPhotoIndividuelle(): ?string
    {
        return $this->photo_individuelle;
    }

    public function setPhotoIndividuelle(?string $photo_individuelle): static
    {
        $this->photo_individuelle = $photo_individuelle;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    public function setDateCreation(?\DateTime $date_creation): static
    {
        $this->date_creation = $date_creation;
        return $this;
    }

    public function getDateSoumission(): ?\DateTime
    {
        return $this->date_soumission;
    }

    public function setDateSoumission(?\DateTime $date_soumission): static
    {
        $this->date_soumission = $date_soumission;
        return $this;
    }
}
