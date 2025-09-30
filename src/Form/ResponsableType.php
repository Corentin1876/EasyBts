<?php

namespace App\Form;

use App\Entity\FormulaireInscription;
use App\Entity\Responsable;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('profession')
            ->add('CodePostal')
            ->add('adresse')
            ->add('ville')
            ->add('tellephone')
            ->add('mail')
            ->add('Nom_Employeur')
            ->add('Adresse_Employeur')
            ->add('lien_avec_eleve')
            ->add('Autorisation_Communication')
            ->add('Tell_Domicile')
            ->add('Tell_Travail')
            ->add('Tell_Mobile')
            ->add('Acceptation_SMS')
            ->add('formulaireInscription', EntityType::class, [
                'class' => FormulaireInscription::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Responsable::class,
        ]);
    }
}
