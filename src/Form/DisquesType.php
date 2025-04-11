<?php

namespace App\Form;

use App\Entity\Disques;
use App\Entity\Set;
use App\Enum\Emplacement;
use App\Enum\mainStat;
use App\Enum\SubStat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
                'choice_value' => function($choice) {
                    return $choice ? str_replace(' ', '_', $choice->getNomSet()) : null;
                },
            ])
            ->add('emplacement', EnumType::class, [
                'class' => Emplacement::class,
                'choice_label' => fn (Emplacement $choice) => $choice->value,
            ])
            ->add('mainStat', EnumType::class, [
                'class' => mainStat::class,
                'choice_label' => fn (mainStat $choice) => $choice->value,
            ])

            ->add('subStat1', EnumType::class, [
                'class' => SubStat::class,
                'choice_label' => fn (SubStat $choice) => $choice->value,
            ])
            ->add('valeurSubStat1', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'attr' => ['autocomplete' => 'off']
            ])

            ->add('subStat2', EnumType::class, [
                'class' => SubStat::class,
                'choice_label' => fn (SubStat $choice) => $choice->value,
            ])
            ->add('valeurSubStat2', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'attr' => ['autocomplete' => 'off']
            ])

            ->add('subStat3', EnumType::class, [
                'class' => SubStat::class,
                'choice_label' => fn (SubStat $choice) => $choice->value,
            ])
            ->add('valeurSubStat3', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'attr' => ['autocomplete' => 'off']
            ])

            ->add('subStat4', EnumType::class, [
                'class' => SubStat::class,
                'choice_label' => fn (SubStat $choice) => $choice->value,
            ])
            ->add('valeurSubStat4', NumberType::class, [
                'scale' => 2,
                'html5' => true,
                'attr' => ['autocomplete' => 'off']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disques::class,
        ]);
    }
}
