<?php

namespace App\Form;

use App\Entity\Demandecheque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Demandecheque1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numerocompte')
            ->add('montant_demande')
            ->add('raison', TextareaType::class)
            ->add('cin')
            ->add('num_telephone')
            ->add('type_cheque', ChoiceType::class, [
                'choices' => [
                    'Barré' => 'barré',
                    'Certifié' => 'certifié',
                ],
            ])
        ;
        if ($options['show_statut_demande']) {
            $builder->add('statut_demande', ChoiceType::class, [
                'choices' => [
                    'En attente' => 'en attente',
                    'Validé' => 'validé',
                    'Rejeté' => 'rejeté',
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'show_statut_demande' => false, // Par défaut, ne pas afficher le champ statut_demande

            // Configure your form options here
        ]);
    }
}
