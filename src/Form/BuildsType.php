<?php

namespace App\Form;

use App\Entity\Builds;
use App\Entity\Disques;
use App\Entity\Moteurs;
use App\Entity\Personnages;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Repository\DisquesRepository;
use Symfony\Bundle\SecurityBundle\Security;

class BuildsType extends AbstractType
{
    private Security $security;
    private DisquesRepository $disquesRepository;

    public function __construct(Security $security, DisquesRepository $disquesRepository)
    {
        $this->security = $security;
        $this->disquesRepository = $disquesRepository;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('personnage', EntityType::class, [
                'class' => Personnages::class,
                'choice_label' => 'nomPersonnage',
                'choice_value' => function($choice) {
                    return $choice ? str_replace(' ', '_', $choice->getNomPersonnage()) : null;
                },
            ])
            ->add('moteur', EntityType::class, [
                'class' => Moteurs::class,
                'choice_label' => 'nomMoteur',
                'choice_value' => function($choice) {
                    return $choice ? str_replace(' ', '_', $choice->getNomMoteur()) : null;
                },
            ])
            ->add('disque1', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques1(),
            ])
            ->add('disque2', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques2(),
            ])
            ->add('disque3', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques3(),
            ])
            ->add('disque4', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques4(),
            ])
            ->add('disque5', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques5(),
            ])
            ->add('disque6', EntityType::class, [
                'class' => Disques::class,
                'choice_label' => 'id',
                'choices' => $this->getUserDisques6(),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Builds::class,
        ]);
    }
    private function getUserDisques1()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 1);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }
    private function getUserDisques2()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 2);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }

    private function getUserDisques3()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 3);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }

    private function getUserDisques4()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 4);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }

    private function getUserDisques5()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 5);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }

    private function getUserDisques6()
    {
        $disques = $this->disquesRepository->findUserDisquesByEmplacement($this->security->getUser(), 6);
            if (empty($disques)) {
                return [];
            }
        return $disques;
    }
}