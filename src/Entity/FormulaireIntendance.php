<?php

namespace App\Entity;

use App\Repository\FormulaireIntendanceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireIntendanceRepository::class)]
class FormulaireIntendance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_etudiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_etudiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $classe = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_representant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_representant = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresse_representant = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $code_postal_representant = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone_representant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_representant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail_representant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_employeur = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresse_employeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etudiant_regime = null;

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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nom_etudiant;
    }

    public function setNomEtudiant(?string $nom_etudiant): static
    {
        $this->nom_etudiant = $nom_etudiant;
        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenom_etudiant;
    }

    public function setPrenomEtudiant(?string $prenom_etudiant): static
    {
        $this->prenom_etudiant = $prenom_etudiant;
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

    public function getNomRepresentant(): ?string
    {
        return $this->nom_representant;
    }

    public function setNomRepresentant(?string $nom_representant): static
    {
        $this->nom_representant = $nom_representant;
        return $this;
    }

    public function getPrenomRepresentant(): ?string
    {
        return $this->prenom_representant;
    }

    public function setPrenomRepresentant(?string $prenom_representant): static
    {
        $this->prenom_representant = $prenom_representant;
        return $this;
    }

    public function getAdresseRepresentant(): ?string
    {
        return $this->adresse_representant;
    }

    public function setAdresseRepresentant(?string $adresse_representant): static
    {
        $this->adresse_representant = $adresse_representant;
        return $this;
    }

    public function getCodePostalRepresentant(): ?string
    {
        return $this->code_postal_representant;
    }

    public function setCodePostalRepresentant(?string $code_postal_representant): static
    {
        $this->code_postal_representant = $code_postal_representant;
        return $this;
    }

    public function getTelephoneRepresentant(): ?string
    {
        return $this->telephone_representant;
    }

    public function setTelephoneRepresentant(?string $telephone_representant): static
    {
        $this->telephone_representant = $telephone_representant;
        return $this;
    }

    public function getVilleRepresentant(): ?string
    {
        return $this->ville_representant;
    }

    public function setVilleRepresentant(?string $ville_representant): static
    {
        $this->ville_representant = $ville_representant;
        return $this;
    }

    public function getMailRepresentant(): ?string
    {
        return $this->mail_representant;
    }

    public function setMailRepresentant(?string $mail_representant): static
    {
        $this->mail_representant = $mail_representant;
        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(?string $nom_employeur): static
    {
        $this->nom_employeur = $nom_employeur;
        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(?string $adresse_employeur): static
    {
        $this->adresse_employeur = $adresse_employeur;
        return $this;
    }

    public function getEtudiantRegime(): ?string
    {
        return $this->etudiant_regime;
    }

    public function setEtudiantRegime(?string $etudiant_regime): static
    {
        $this->etudiant_regime = $etudiant_regime;
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
