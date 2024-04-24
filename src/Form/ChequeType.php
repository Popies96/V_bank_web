<?php

namespace App\Form;

use App\Entity\Cheque;
use App\Entity\Demandecheque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ChequeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero_de_cheque')
            ->add('montant')
            ->add('beneficiaire')
            ->add('emetteur')
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'EN_ATTENTE' => 'EN_ATTENTE',
                    'ENCAISSE' => 'ENCAISSE',
                    'REJETE' => 'REJETE',

                ],
            ])
            ->add('numerocompte', EntityType::class, [
                'class' => Demandecheque::class,
                'choice_label' => 'numerocompte', // Spécifiez la propriété à utiliser comme libellé
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cheque::class,
        ]);
    }
}
