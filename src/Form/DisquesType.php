<?php

namespace App\Form;

use App\Entity\Disques;
use App\Entity\set;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisquesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('emplacement')
            ->add('mainStat')
            ->add('subStat1')
            ->add('procSubStat1')
            ->add('subStat2')
            ->add('procSubStat2')
            ->add('subStat3')
            ->add('procSubStat3')
            ->add('subStat4')
            ->add('procSubStat4')
            ->add('ensemble', EntityType::class, [
                'class' => set::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Disques::class,
        ]);
    }
}
