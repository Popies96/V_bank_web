<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AlimenterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', TextType::class, [
                'label' => 'Amount to Charge (USD)',
            ])
            ->add('cardNumber', TextType::class, [
                'label' => 'Card Number',
            ])
            ->add('expirationDate', TextType::class, [
                'label' => 'Expiration Date (MM/YY)',
            ])
            ->add('cvc', TextType::class, [
                'label' => 'CVC',
            ])
            ->add('stripeToken', TextType::class, [
                'mapped' => false,
                'attr' => [
                    'id' => 'stripeToken',
                    'hidden' => true,
                ],

            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
