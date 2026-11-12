<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $countries = [
            'Poland' => 'PL',
            'Germany' => 'DE',
            'France' => 'FR',
            'Spain' => 'ES',
            'Italy' => 'IT',
            'United Kingdom' => 'GB',
            'United States' => 'US',
        ];

        $builder
            ->add('city', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter city name',
                ],
            ])
            ->add('country', ChoiceType::class, [
                'choices' => $countries,
                'placeholder' => 'Choose country',
            ])
            ->add('latitude', NumberType::class, [
                'scale' => 7,
                'html5' => true,
                'attr' => [
                    'step' => 0.0000001,
                    'min' => -90,
                    'max' => 90,
                ],
            ])
            ->add('longtitude', NumberType::class, [
                'scale' => 7,
                'html5' => true,
                'attr' => [
                    'step' => 0.0000001,
                    'min' => -180,
                    'max' => 180,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
            'validation_groups' => ['new'],
        ]);
    }
}
