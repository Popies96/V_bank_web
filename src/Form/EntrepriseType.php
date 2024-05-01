<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),

                ]
            ])
            ->add('industrie', ChoiceType::class, [
                'choices' => [
                    'Technology' => 'technology',
                    'Finance' => 'finance',
                    'Healthcare' => 'healthcare',
                    'Automotive' => 'automative',
                    'Manufacturing' => 'manufacturing'

                ],
                'placeholder' => 'Choose a industry',
                'constraints' => [
                    new Assert\NotBlank(),
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Grande' => 'grande',
                    'Moyenne' => 'moyenne',
                    'Petite' => 'petite',
                ],
                'placeholder' => 'Choose a type',
                'constraints' => [
                    new Assert\NotBlank(),
                ]
            ])
            ->add('solde', TextType::class, [
                // Add constraints for 'solde' field
            ])
            ->add('adresse', TextType::class, [

            ])
            ->add('adresse')
            ->add('tel', TelType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => '/^\d{8}$/',
                        'message' => 'Please enter a valid 8-digit phone number.'
                    ]),
                ]
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => [
                    'France' => 'France',
                    'Tunisia' => 'Tunisia',
                    'United States' => 'United States',
                    'United Kingdom' => 'United Kingdom',

                ],
                'placeholder' => 'Choose a country',
                'constraints' => [
                    new Assert\NotBlank(),
                ]
            ])
            ->add('adresseMail', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
                        'message' => 'Please enter a valid email address.'
                    ]),
                    // Add other constraints as needed
                ]
            ])
            ->add('motDePasse', PasswordType::class, [
                'constraints' => [
                    new Assert\NotBlank(),

                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
