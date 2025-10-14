<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class ContactFormData
{
    #[Assert\NotBlank(message: 'La civilité est obligatoire')]
    #[Assert\Choice(choices: ['mr','mme'], message: 'Civilité invalide')]
    public ?string $civilite = null;

    #[Assert\NotBlank(message: 'Le nom est obligatoire')]
    #[Assert\Length(min:2, max:100)]
    public ?string $nom = null;

    #[Assert\NotBlank(message: 'Le prénom est obligatoire')]
    #[Assert\Length(min:2, max:100)]
    public ?string $prenom = null;

    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(message: 'Email invalide')]
    public ?string $email = null;

    // Autorise espaces ou absence
    #[Assert\Regex(pattern: '/^$|^0[1-9]( ?[0-9]{2}){4}$/', message: 'Téléphone invalide (ex: 0612345678 ou 06 12 34 56 78)')]
    public ?string $telephone = null;

    #[Assert\NotBlank(message: 'Le sujet est obligatoire')]
    #[Assert\Choice(choices: ['inscription','documents','specialisations','calendrier','technique','autre'])]
    public ?string $sujet = null;

    #[Assert\NotBlank(message: 'Le message est obligatoire')]
    #[Assert\Length(min:10, minMessage: 'Le message doit contenir au moins {{ limit }} caractères')]
    public ?string $message = null;

    #[Assert\IsTrue(message: 'Vous devez accepter le traitement de vos données personnelles')]
    public ?bool $consent = null;
}