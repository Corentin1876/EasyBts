<?php

namespace App\Message;

use Symfony\Component\Validator\Constraints as Assert;

class ContactMessage
{
    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['mr', 'mme'])]
    private string $civilite;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100)]
    private string $nom;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 100)]
    private string $prenom;

    #[Assert\NotBlank]
    #[Assert\Email]
    private string $email;

    #[Assert\Regex(pattern: '/^0[1-9][0-9]{8}$/', message: 'Format téléphone invalide')]
    private ?string $telephone;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: ['inscription', 'documents', 'specialisations', 'calendrier', 'technique', 'autre'])]
    private string $sujet;

    #[Assert\NotBlank]
    #[Assert\Length(min: 10)]
    private string $message;

    #[Assert\IsTrue]
    private bool $consent;

    private \DateTimeImmutable $createdAt;

    public function __construct(
        string $civilite,
        string $nom,
        string $prenom,
        string $email,
        ?string $telephone,
        string $sujet,
        string $message,
        bool $consent
    ) {
        $this->civilite = $civilite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->sujet = $sujet;
        $this->message = $message;
        $this->consent = $consent;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getCivilite(): string { return $this->civilite; }
    public function getNom(): string { return $this->nom; }
    public function getPrenom(): string { return $this->prenom; }
    public function getEmail(): string { return $this->email; }
    public function getTelephone(): ?string { return $this->telephone; }
    public function getSujet(): string { return $this->sujet; }
    public function getMessage(): string { return $this->message; }
    public function hasConsent(): bool { return $this->consent; }
    public function getCreatedAt(): \DateTimeImmutable { return $this->createdAt; }
}