<?php

namespace App\Form;

use App\Entity\Builds;
use App\Entity\disques;
use App\Entity\personnages;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => user::class,
                'choice_label' => 'id',
            ])
            ->add('personnage', EntityType::class, [
                'class' => personnages::class,
                'choice_label' => 'id',
            ])
            ->add('disque1', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
            ->add('disque2', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
            ->add('disque3', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
            ->add('disque4', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
            ->add('disque5', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
            ->add('disque6', EntityType::class, [
                'class' => disques::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Builds::class,
        ]);
    }
}
