<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Carburants;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carburants', EntityType::class, [
                'label' => false,
                'required'=>false,
                'class'=> carburants::class,
                'expanded'=> true,
                'multiple'=> true
            ])
            ->add('prixMin', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Prix min']
            ])
            ->add('prixMax', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Prix max']
            ])
            ->add('kmMin', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Km min']
            ])
            ->add('kmMax', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Km max']
            ])
            ->add('yearMin', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Année min']
            ])
            ->add('yearMax', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr'=> ['placeholder'=> 'Année max']
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>SearchData::class,
            'method'=>'GET',
            'crsf_protection'=> false,
        ])
    ;}

    public function getBlockPrefix()
    {
        return '';
    }

}