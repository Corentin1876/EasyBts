<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_creation = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $user = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    /**
     * @var Collection<int, FormulaireInscription>
     */
    #[ORM\OneToMany(targetEntity: FormulaireInscription::class, mappedBy: 'remplit_formulaire')]
    private Collection $formulaireInscriptions;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?InformationEleve $contient_information_eleve = null;

    public function __construct()
    {
        $this->formulaireInscriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getDateCreation(): ?\DateTime
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTime $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDateNaissance(): ?\DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTime $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

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

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection<int, FormulaireInscription>
     */
    public function getFormulaireInscriptions(): Collection
    {
        return $this->formulaireInscriptions;
    }

    public function addFormulaireInscription(FormulaireInscription $formulaireInscription): static
    {
        if (!$this->formulaireInscriptions->contains($formulaireInscription)) {
            $this->formulaireInscriptions->add($formulaireInscription);
            $formulaireInscription->setRemplitFormulaire($this);
        }

        return $this;
    }

    public function removeFormulaireInscription(FormulaireInscription $formulaireInscription): static
    {
        if ($this->formulaireInscriptions->removeElement($formulaireInscription)) {
            // set the owning side to null (unless already changed)
            if ($formulaireInscription->getRemplitFormulaire() === $this) {
                $formulaireInscription->setRemplitFormulaire(null);
            }
        }

        return $this;
    }

    public function getContientInformationEleve(): ?InformationEleve
    {
        return $this->contient_information_eleve;
    }

    public function setContientInformationEleve(?InformationEleve $contient_information_eleve): static
    {
        $this->contient_information_eleve = $contient_information_eleve;

        return $this;
    }
}
