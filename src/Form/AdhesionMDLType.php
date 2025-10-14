<?php

namespace App\Form;

use App\Entity\AdhesionMDL;
use App\Entity\FormulaireInscription;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdhesionMDLType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Montant_Adhesion')
            ->add('Mode_Reglement')
            ->add('formulaireInscription', EntityType::class, [
                'class' => FormulaireInscription::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdhesionMDL::class,
        ]);
    }
}
