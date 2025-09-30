<?php

namespace App\Form;

use App\Entity\AnneeScolaire;
use App\Entity\InformationEleve;
use App\Entity\ScolariteDes2AnneeAnterieur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnneeScolaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Date')
            ->add('informationEleve', EntityType::class, [
                'class' => InformationEleve::class,
                'choice_label' => 'id',
            ])
            ->add('scolariteDes2AnneeAnterieur', EntityType::class, [
                'class' => ScolariteDes2AnneeAnterieur::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnneeScolaire::class,
        ]);
    }
}
