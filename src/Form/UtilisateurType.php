<?php

namespace App\Form;

use App\Entity\InformationEleve;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('mot_de_passe')
            ->add('role')
            ->add('date_creation')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('user')
            ->add('date_naissance')
            ->add('adresse')
            ->add('departement')
            ->add('contient_information_eleve', EntityType::class, [
                'class' => InformationEleve::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
