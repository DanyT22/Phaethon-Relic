<?php

namespace App\Form;

use App\Entity\Moteurs;
use App\Entity\raretes;
use App\Entity\specialites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomMoteur')
            ->add('rarete', EntityType::class, [
                'class' => raretes::class,
                'choice_label' => 'id',
            ])
            ->add('specialite', EntityType::class, [
                'class' => specialites::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Moteurs::class,
        ]);
    }
}
