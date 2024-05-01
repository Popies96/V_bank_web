<?php

namespace App\Form;

use App\Entity\Demandedecredit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Validator\Constraints as Assert;
use ConsoleTVs\Profanity\Builder;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class DemandedecreditType extends AbstractType
{public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('cin', null, [
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 8, 'max' => 8]),
                new Type(['type' => 'numeric']), // Ensure it's numeric
            ],
            'attr' => [
                'style' => 'width: 90%; padding: 6px; border: 1px solid #ccc; border-radius: 2px; box-sizing: border-box;'
            ]
        ])
        ->add('nom')
        ->add('prenom')
        ->add('phone')
        ->add('typedecredit', ChoiceType::class, [
            'choices' => [
                'Consommation' => 'consommation',
                'Personnelle' => 'personnelle',
                'Aménagement' => 'aménagement',
                'Étude' => 'étude',
            ],
            'placeholder' => 'Choisir le type de crédit',
            'attr' => ['class' => 'form-control']
        ])
        ->add('etatcivil', ChoiceType::class, [
            'choices' => [
                'Marié(e)' => 'marié(e)',
                'Célibataire' => 'célibataire',
            ],
            'placeholder' => 'Choisir votre état civil',
            'attr' => ['class' => 'form-control']
        ])
        ->add('bulletin', FileType::class, [
            'label' => 'Bulletin', // Label for the file upload field
            'mapped' => false, // Tell Symfony not to map this field to any entity property
            'required' => true, // Make the file upload field required
        ])
        ->add('sommedecredit')
        ->add('echeance')
        ->add('captcha', Recaptcha3Type::class, [
            'constraints' => new Recaptcha3(),
            'action_name' => 'app_demandedecredit_new',
        ]);
//        $builder
//            ->add('bads', null, [
//                'constraints' => [
//                    new NotNull(['message' => 'Program name cannot be empty.']),
//                    new Length(['min' => 2, 'minMessage' => 'Program name must be at least {{ limit }} characters long.']),
//                    new Assert\Callback([$this, 'validateNomExercice']),
//                ]
//            ]) ;


}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demandedecredit::class,
        ]);

    }
    public function validateNomExercice($value, ExecutionContextInterface $context)
    {
        $clean = Builder::blocker($value)->clean();

        if (!$clean) {
            $context->buildViolation('Programme Name contains profanity.')
                ->addViolation();
        }
    }
}
