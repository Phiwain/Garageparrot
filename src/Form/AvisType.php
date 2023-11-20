<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('commentaire', TextareaType::class)
            ->add('note', NumberType::class, [
                'label' => 'Note (comprise entre 0 et 5)',
                'constraints' => [
                    new range([
                        'min' => 0,
                        'max' => 5,
                        'minMessage' => 'La note doit être au moins égale à 0.',
                        'maxMessage' => 'La note doit être au plus égale à 5.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class)
            ->add(child: 'submit',type: SubmitType::class,options: [
                'label'=>"Laissez un commentaire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
