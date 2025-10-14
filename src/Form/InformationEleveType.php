<?php

namespace App\Form;

use App\Entity\InformationEleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationEleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('NiveauClasse')
            ->add('Sexe')
            ->add('NumeroSecuriterSocial')
            ->add('Date_Entree')
            ->add('Nationalite')
            ->add('Naissance_Departement')
            ->add('Naissance_Commune')
            ->add('Redoublement')
            ->add('Transport')
            ->add('TypeTransport')
            ->add('NumeroImmatriculationVehicule')
            ->add('Specialiter')
            ->add('Langues')
            ->add('Dernier_Diplome')
            ->add('RegimeChoisi')
            ->add('DateChoixRegime')
            ->add('Autorisation_Droit_Image')
            ->add('PosibiliteDeChangementFinTrimestre')
            ->add('Acceptation_SMS')
            ->add('AutorisationCommunication')
            ->add('est_majeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InformationEleve::class,
        ]);
    }
}
