<?php

namespace App\Form;

use App\Entity\Disques;
use App\Entity\Set;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\Choice;

class DisquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ensemble', EntityType::class, [
                'class' => set::class,
                'choice_label' => 'nomSet',
            ])
            ->add('emplacement', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                ],
            ])
            ->add('mainStat', ChoiceType::class, [
                'choices' => [
                    "PV" => "PV",
                    "PV%" => "PV%",
                    "ATQ" => "ATQ",
                    "ATQ%" => "ATQ%",
                    "DEF" => "DEF",
                    "DEF%" => "DEF%",
                    "Taux CRIT" => "Taux CRIT",
                    "DGT CRIT" => "DGT CRIT",
                    "Adresse d'anomalie" => "Adresse d'anomalie",
                    "Taux de PEN" => "Taux de PEN",
                    "DGT physique" => "DGT physique",
                    "DGT Feu" => "DGT Feu",
                    "DGT glace" => "DGT glace",
                    "DGT electriques" => "DGT electriques",
                    "DGT etheriques" => "DGT etheriques",
                    "Maitrise d'anomalie" => "Maitrise d'anomalie",
                    "Impact" => "Impact",
                    "Recuperation d'energie" => "Recuperation d'energie",
                ]
            ])
            ->add('subStat1', ChoiceType::class, [
                'choices' => [
                    "PV" => "PV",
                    "PV%" => "PV%",
                    "ATQ" => "ATQ",
                    "ATQ%" => "ATQ%",
                    "DEF" => "DEF",
                    "DEF%" => "DEF%",
                    "PEN" => "PEN",
                    "Taux CRIT" => "Taux CRIT",
                    "DGT CRIT" => "DGT CRIT",
                    "Adresse d'anomalie" => "Adresse d'anomalie",
                ]
            ])
            ->add('valeurSubStat1')
            ->add('subStat2', ChoiceType::class, [
                'choices' => [
                    "PV" => "PV",
                    "PV%" => "PV%",
                    "ATQ" => "ATQ",
                    "ATQ%" => "ATQ%",
                    "DEF" => "DEF",
                    "DEF%" => "DEF%",
                    "PEN" => "PEN",
                    "Taux CRIT" => "Taux CRIT",
                    "DGT CRIT" => "DGT CRIT",
                    "Adresse d'anomalie" => "Adresse d'anomalie",
                ]
            ])
            ->add('valeurSubStat2')
            ->add('subStat3', ChoiceType::class, [
                'choices' => [
                    "PV" => "PV",
                    "PV%" => "PV%",
                    "ATQ" => "ATQ",
                    "ATQ%" => "ATQ%",
                    "DEF" => "DEF",
                    "DEF%" => "DEF%",
                    "PEN" => "PEN",
                    "Taux CRIT" => "Taux CRIT",
                    "DGT CRIT" => "DGT CRIT",
                    "Adresse d'anomalie" => "Adresse d'anomalie",
                ]
            ])
            ->add('valeurSubStat3')
            ->add('subStat4', ChoiceType::class, [
                'choices' => [
                    "PV" => "PV",
                    "PV%" => "PV%",
                    "ATQ" => "ATQ",
                    "ATQ%" => "ATQ%",
                    "DEF" => "DEF",
                    "DEF%" => "DEF%",
                    "PEN" => "PEN",
                    "Taux CRIT" => "Taux CRIT",
                    "DGT CRIT" => "DGT CRIT",
                    "Adresse d'anomalie" => "Adresse d'anomalie",
                ]
            ])
            ->add('valeurSubStat4')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disques::class,
        ]);
    }
}
