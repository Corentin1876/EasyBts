<?php

namespace App\Entity;

use App\Repository\FormulaireInscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormulaireInscriptionRepository::class)]
class FormulaireInscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_formulaire = null;

    #[ORM\Column]
    private ?bool $est_signe = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_soumission = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'formulaireInscriptions')]
    private ?Utilisateur $remplit_formulaire = null;

    /**
     * @var Collection<int, Sante>
     */
    #[ORM\OneToMany(targetEntity: Sante::class, mappedBy: 'formulaireInscription')]
    private Collection $a_informations_sante;

    /**
     * @var Collection<int, ScolariteDes2AnneeAnterieur>
     */
    #[ORM\OneToMany(targetEntity: ScolariteDes2AnneeAnterieur::class, mappedBy: 'formulaireInscription')]
    private Collection $a_scolarite_anterieure;

    /**
     * @var Collection<int, AdhesionMDL>
     */
    #[ORM\OneToMany(targetEntity: AdhesionMDL::class, mappedBy: 'formulaireInscription')]
    private Collection $inclut_adhesion_mdl;

    /**
     * @var Collection<int, Responsable>
     */
    #[ORM\OneToMany(targetEntity: Responsable::class, mappedBy: 'formulaireInscription')]
    private Collection $responsable_de;

    /**
     * @var Collection<int, SecuriteSociale>
     */
    #[ORM\OneToMany(targetEntity: SecuriteSociale::class, mappedBy: 'formulaireInscription')]
    private Collection $a_securite_sociale;

    /**
     * @var Collection<int, AssuranceScolaire>
     */
    #[ORM\OneToMany(targetEntity: AssuranceScolaire::class, mappedBy: 'formulaireInscription')]
    private Collection $couvert_par_assurance;

    // Colonnes pour les brouillons
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $draft_json = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $draft_step = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $draft_updated_at = null;

    public function __construct()
    {
        $this->a_informations_sante = new ArrayCollection();
        $this->a_scolarite_anterieure = new ArrayCollection();
        $this->inclut_adhesion_mdl = new ArrayCollection();
        $this->responsable_de = new ArrayCollection();
        $this->a_securite_sociale = new ArrayCollection();
        $this->couvert_par_assurance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeFormulaire(): ?string
    {
        return $this->type_formulaire;
    }

    public function setTypeFormulaire(string $type_formulaire): static
    {
        $this->type_formulaire = $type_formulaire;

        return $this;
    }

    public function isEstSigne(): ?bool
    {
        return $this->est_signe;
    }

    public function setEstSigne(bool $est_signe): static
    {
        $this->est_signe = $est_signe;

        return $this;
    }

    public function getDateSoumission(): ?\DateTime
    {
        return $this->date_soumission;
    }

    public function setDateSoumission(\DateTime $date_soumission): static
    {
        $this->date_soumission = $date_soumission;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getRemplitFormulaire(): ?Utilisateur
    {
        return $this->remplit_formulaire;
    }

    public function setRemplitFormulaire(?Utilisateur $remplit_formulaire): static
    {
        $this->remplit_formulaire = $remplit_formulaire;

        return $this;
    }

    /**
     * @return Collection<int, Sante>
     */
    public function getAInformationsSante(): Collection
    {
        return $this->a_informations_sante;
    }

    public function addAInformationsSante(Sante $aInformationsSante): static
    {
        if (!$this->a_informations_sante->contains($aInformationsSante)) {
            $this->a_informations_sante->add($aInformationsSante);
            $aInformationsSante->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeAInformationsSante(Sante $aInformationsSante): static
    {
        if ($this->a_informations_sante->removeElement($aInformationsSante)) {
            // set the owning side to null (unless already changed)
            if ($aInformationsSante->getFormulaireInscription() === $this) {
                $aInformationsSante->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ScolariteDes2AnneeAnterieur>
     */
    public function getAScolariteAnterieure(): Collection
    {
        return $this->a_scolarite_anterieure;
    }

    public function addAScolariteAnterieure(ScolariteDes2AnneeAnterieur $aScolariteAnterieure): static
    {
        if (!$this->a_scolarite_anterieure->contains($aScolariteAnterieure)) {
            $this->a_scolarite_anterieure->add($aScolariteAnterieure);
            $aScolariteAnterieure->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeAScolariteAnterieure(ScolariteDes2AnneeAnterieur $aScolariteAnterieure): static
    {
        if ($this->a_scolarite_anterieure->removeElement($aScolariteAnterieure)) {
            // set the owning side to null (unless already changed)
            if ($aScolariteAnterieure->getFormulaireInscription() === $this) {
                $aScolariteAnterieure->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdhesionMDL>
     */
    public function getInclutAdhesionMdl(): Collection
    {
        return $this->inclut_adhesion_mdl;
    }

    public function addInclutAdhesionMdl(AdhesionMDL $inclutAdhesionMdl): static
    {
        if (!$this->inclut_adhesion_mdl->contains($inclutAdhesionMdl)) {
            $this->inclut_adhesion_mdl->add($inclutAdhesionMdl);
            $inclutAdhesionMdl->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeInclutAdhesionMdl(AdhesionMDL $inclutAdhesionMdl): static
    {
        if ($this->inclut_adhesion_mdl->removeElement($inclutAdhesionMdl)) {
            // set the owning side to null (unless already changed)
            if ($inclutAdhesionMdl->getFormulaireInscription() === $this) {
                $inclutAdhesionMdl->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Responsable>
     */
    public function getResponsableDe(): Collection
    {
        return $this->responsable_de;
    }

    public function addResponsableDe(Responsable $responsableDe): static
    {
        if (!$this->responsable_de->contains($responsableDe)) {
            $this->responsable_de->add($responsableDe);
            $responsableDe->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeResponsableDe(Responsable $responsableDe): static
    {
        if ($this->responsable_de->removeElement($responsableDe)) {
            // set the owning side to null (unless already changed)
            if ($responsableDe->getFormulaireInscription() === $this) {
                $responsableDe->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SecuriteSociale>
     */
    public function getASecuriteSociale(): Collection
    {
        return $this->a_securite_sociale;
    }

    public function addASecuriteSociale(SecuriteSociale $aSecuriteSociale): static
    {
        if (!$this->a_securite_sociale->contains($aSecuriteSociale)) {
            $this->a_securite_sociale->add($aSecuriteSociale);
            $aSecuriteSociale->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeASecuriteSociale(SecuriteSociale $aSecuriteSociale): static
    {
        if ($this->a_securite_sociale->removeElement($aSecuriteSociale)) {
            // set the owning side to null (unless already changed)
            if ($aSecuriteSociale->getFormulaireInscription() === $this) {
                $aSecuriteSociale->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AssuranceScolaire>
     */
    public function getCouvertParAssurance(): Collection
    {
        return $this->couvert_par_assurance;
    }

    public function addCouvertParAssurance(AssuranceScolaire $couvertParAssurance): static
    {
        if (!$this->couvert_par_assurance->contains($couvertParAssurance)) {
            $this->couvert_par_assurance->add($couvertParAssurance);
            $couvertParAssurance->setFormulaireInscription($this);
        }

        return $this;
    }

    public function removeCouvertParAssurance(AssuranceScolaire $couvertParAssurance): static
    {
        if ($this->couvert_par_assurance->removeElement($couvertParAssurance)) {
            // set the owning side to null (unless already changed)
            if ($couvertParAssurance->getFormulaireInscription() === $this) {
                $couvertParAssurance->setFormulaireInscription(null);
            }
        }

        return $this;
    }

    // Getters et Setters pour les brouillons
    public function getDraftJson(): ?string
    {
        return $this->draft_json;
    }

    public function setDraftJson(?string $draft_json): static
    {
        $this->draft_json = $draft_json;
        return $this;
    }

    public function getDraftStep(): ?int
    {
        return $this->draft_step;
    }

    public function setDraftStep(?int $draft_step): static
    {
        $this->draft_step = $draft_step;
        return $this;
    }

    public function getDraftUpdatedAt(): ?\DateTimeInterface
    {
        return $this->draft_updated_at;
    }

    public function setDraftUpdatedAt(?\DateTimeInterface $draft_updated_at): static
    {
        $this->draft_updated_at = $draft_updated_at;
        return $this;
    }
}
