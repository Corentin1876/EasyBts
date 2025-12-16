<?php

namespace App\Entity;

use App\Repository\FicheUrgenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheUrgenceRepository::class)]
class FicheUrgence
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

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $sexe = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_representant = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $adresse_representant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $centre_secu_nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $centre_secu_adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $assurance_nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $assurance_adresse = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $assurance_numero = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $pere_tel_domicile = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $pere_tel_travail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pere_poste = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $pere_tel_perso = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $mere_tel_travail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mere_poste = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $mere_tel_perso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_contact_urgence = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel_contact_urgence = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $date_vaccin_antitetanique = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $observation_etudiant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $medecin_nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $medecin_adresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $medecin_numero = null;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): static
    {
        $this->sexe = $sexe;
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

    public function getAdresseRepresentant(): ?string
    {
        return $this->adresse_representant;
    }

    public function setAdresseRepresentant(?string $adresse_representant): static
    {
        $this->adresse_representant = $adresse_representant;
        return $this;
    }

    public function getCentreSecuNom(): ?string
    {
        return $this->centre_secu_nom;
    }

    public function setCentreSecuNom(?string $centre_secu_nom): static
    {
        $this->centre_secu_nom = $centre_secu_nom;
        return $this;
    }

    public function getCentreSecuAdresse(): ?string
    {
        return $this->centre_secu_adresse;
    }

    public function setCentreSecuAdresse(?string $centre_secu_adresse): static
    {
        $this->centre_secu_adresse = $centre_secu_adresse;
        return $this;
    }

    public function getAssuranceNom(): ?string
    {
        return $this->assurance_nom;
    }

    public function setAssuranceNom(?string $assurance_nom): static
    {
        $this->assurance_nom = $assurance_nom;
        return $this;
    }

    public function getAssuranceAdresse(): ?string
    {
        return $this->assurance_adresse;
    }

    public function setAssuranceAdresse(?string $assurance_adresse): static
    {
        $this->assurance_adresse = $assurance_adresse;
        return $this;
    }

    public function getAssuranceNumero(): ?string
    {
        return $this->assurance_numero;
    }

    public function setAssuranceNumero(?string $assurance_numero): static
    {
        $this->assurance_numero = $assurance_numero;
        return $this;
    }

    public function getPereTelDomicile(): ?string
    {
        return $this->pere_tel_domicile;
    }

    public function setPereTelDomicile(?string $pere_tel_domicile): static
    {
        $this->pere_tel_domicile = $pere_tel_domicile;
        return $this;
    }

    public function getPereTelTravail(): ?string
    {
        return $this->pere_tel_travail;
    }

    public function setPereTelTravail(?string $pere_tel_travail): static
    {
        $this->pere_tel_travail = $pere_tel_travail;
        return $this;
    }

    public function getPerePoste(): ?string
    {
        return $this->pere_poste;
    }

    public function setPerePoste(?string $pere_poste): static
    {
        $this->pere_poste = $pere_poste;
        return $this;
    }

    public function getPereTelPerso(): ?string
    {
        return $this->pere_tel_perso;
    }

    public function setPereTelPerso(?string $pere_tel_perso): static
    {
        $this->pere_tel_perso = $pere_tel_perso;
        return $this;
    }

    public function getMereTelTravail(): ?string
    {
        return $this->mere_tel_travail;
    }

    public function setMereTelTravail(?string $mere_tel_travail): static
    {
        $this->mere_tel_travail = $mere_tel_travail;
        return $this;
    }

    public function getMerePoste(): ?string
    {
        return $this->mere_poste;
    }

    public function setMerePoste(?string $mere_poste): static
    {
        $this->mere_poste = $mere_poste;
        return $this;
    }

    public function getMereTelPerso(): ?string
    {
        return $this->mere_tel_perso;
    }

    public function setMereTelPerso(?string $mere_tel_perso): static
    {
        $this->mere_tel_perso = $mere_tel_perso;
        return $this;
    }

    public function getNomContactUrgence(): ?string
    {
        return $this->nom_contact_urgence;
    }

    public function setNomContactUrgence(?string $nom_contact_urgence): static
    {
        $this->nom_contact_urgence = $nom_contact_urgence;
        return $this;
    }

    public function getTelContactUrgence(): ?string
    {
        return $this->tel_contact_urgence;
    }

    public function setTelContactUrgence(?string $tel_contact_urgence): static
    {
        $this->tel_contact_urgence = $tel_contact_urgence;
        return $this;
    }

    public function getDateVaccinAntitetanique(): ?\DateTime
    {
        return $this->date_vaccin_antitetanique;
    }

    public function setDateVaccinAntitetanique(?\DateTime $date_vaccin_antitetanique): static
    {
        $this->date_vaccin_antitetanique = $date_vaccin_antitetanique;
        return $this;
    }

    public function getObservationEtudiant(): ?string
    {
        return $this->observation_etudiant;
    }

    public function setObservationEtudiant(?string $observation_etudiant): static
    {
        $this->observation_etudiant = $observation_etudiant;
        return $this;
    }

    public function getMedecinNom(): ?string
    {
        return $this->medecin_nom;
    }

    public function setMedecinNom(?string $medecin_nom): static
    {
        $this->medecin_nom = $medecin_nom;
        return $this;
    }

    public function getMedecinAdresse(): ?string
    {
        return $this->medecin_adresse;
    }

    public function setMedecinAdresse(?string $medecin_adresse): static
    {
        $this->medecin_adresse = $medecin_adresse;
        return $this;
    }

    public function getMedecinNumero(): ?string
    {
        return $this->medecin_numero;
    }

    public function setMedecinNumero(?string $medecin_numero): static
    {
        $this->medecin_numero = $medecin_numero;
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
