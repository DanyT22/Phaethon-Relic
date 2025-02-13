<?php

namespace App\Form;

use App\Entity\elements;
use App\Entity\factions;
use App\Entity\Personnages;
use App\Entity\raretes;
use App\Entity\specialites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonnagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPersonnage')
            ->add('rarete', EntityType::class, [
                'class' => raretes::class,
                'choice_label' => 'id',
            ])
            ->add('element', EntityType::class, [
                'class' => elements::class,
                'choice_label' => 'id',
            ])
            ->add('specialite', EntityType::class, [
                'class' => specialites::class,
                'choice_label' => 'id',
            ])
            ->add('faction', EntityType::class, [
                'class' => factions::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnages::class,
        ]);
    }
}
