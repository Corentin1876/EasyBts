<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'label' => 'Civilité',
                'choices' => [
                    'Sélectionner' => '',
                    'Monsieur' => 'mr',
                    'Madame' => 'mme',
                ],
                'required' => true,
                'attr' => ['class' => 'fr-select'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Sélectionnez votre civilité',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'attr' => ['class' => 'fr-input'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Votre nom de famille',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'attr' => ['class' => 'fr-input'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Votre prénom',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse électronique',
                'required' => true,
                'attr' => ['class' => 'fr-input'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Format attendu : nom@exemple.fr',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Numéro de téléphone (optionnel)',
                'required' => false,
                'attr' => ['class' => 'fr-input'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Format : 0X XX XX XX XX',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('sujet', ChoiceType::class, [
                'label' => 'Sujet de votre demande',
                'choices' => [
                    'Sélectionner un sujet' => '',
                    'Question sur l\'inscription' => 'inscription',
                    'Documents requis' => 'documents',
                    'Spécialisations disponibles' => 'specialisations',
                    'Calendrier et dates importantes' => 'calendrier',
                    'Problème technique' => 'technique',
                    'Autre demande' => 'autre',
                ],
                'required' => true,
                'attr' => ['class' => 'fr-select'],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Sélectionnez le sujet qui correspond le mieux à votre demande',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => true,
                'attr' => [
                    'class' => 'fr-input',
                    'rows' => 6,
                ],
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Décrivez votre demande de manière détaillée',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
            ->add('consent', CheckboxType::class, [
                'label' => 'J\'accepte que mes données personnelles soient utilisées pour traiter ma demande',
                'required' => true,
                'label_attr' => ['class' => 'fr-label'],
                'help' => 'Vos données sont traitées conformément à notre politique de confidentialité',
                'help_attr' => ['class' => 'fr-hint-text'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}