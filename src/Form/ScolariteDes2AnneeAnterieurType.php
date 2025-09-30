<?php

namespace App\Form;

use App\Entity\FormulaireInscription;
use App\Entity\ScolariteDes2AnneeAnterieur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScolariteDes2AnneeAnterieurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Classe')
            ->add('LangueLV1')
            ->add('LangueLV2')
            ->add('Option_Matiere')
            ->add('Etablisement')
            ->add('formulaireInscription', EntityType::class, [
                'class' => FormulaireInscription::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScolariteDes2AnneeAnterieur::class,
        ]);
    }
}
