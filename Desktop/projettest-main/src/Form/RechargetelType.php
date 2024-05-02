<?php

namespace App\Form;

use App\Entity\Rechargetel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RechargetelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('operateur', ChoiceType::class, [
                'choices' => [
                    'Telecom' => 'Telecom',
                    'Ooredoo' => 'Ooredoo',
                    'Orange' => 'Orange',
                ],
                'placeholder' => 'Select type',
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('montant', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Type(['type' => 'numeric']),
                    new Assert\Regex([
                        'pattern' => '/^[0-9]+$/',
                        'message' => 'numeric characters only',
                    ]),
                ],
            ])
            ->add('numtel', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['min' => 8, 'max' => 8]),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rechargetel::class,
        ]);
    }
}
