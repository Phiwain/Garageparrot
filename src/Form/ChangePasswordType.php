<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                'disabled'=>true,
                'label'=> 'Mon nom'
            ] )
            ->add('prenom',TextType::class,[
                'disabled'=>true,
                'label'=>'Mon Prénom'
            ])
            ->add('email', EmailType::class,  [
                'disabled'=>true,
                'label'=>'Mon adresse mail'
            ])
            ->add('old_password', PasswordType::class, [
                'label'=> 'Mon ancien mot de passe',
                'mapped'=> false,
                'attr'=> [
                    'placeholder' => 'Veuillez saisir votre ancien mot de passe'
                ]
            ])
            ->add('new_password',RepeatedType::class, [
                'type'=> PasswordType::class,
                'mapped'=> false,
                'invalid_message'=>'Les deux mots de passe doivent etre identiques',
                'label'=>'Votre nouveau mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Nouveau mot de passe',
                    'attr'=>['placeholder'=>'Merci de saisir votre nouveau mot de passe']
                ],
                'second_options'=>[
                    'label'=>'Confirmez votre mot de passe',
                    'attr'=>['placeholder'=>'Confirmez votre mot de passe']
                ]
            ])

            ->add(child: 'submit',type: SubmitType::class,options: [
                'label'=>"Mettre à jour"
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
