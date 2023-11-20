<?php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class RangeSliderType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
$builder
->add('min', NumberType::class, [
'label' => false,
'attr' => [
'class' => 'range-slider-input',
'min' => $options['min'],
'max' => $options['max'],
'step' => $options['step'],
],
])
->add('max', NumberType::class, [
'label' => false,
'attr' => [
'class' => 'range-slider-input',
'min' => $options['min'],
'max' => $options['max'],
'step' => $options['step'],
],
])
->add('range', HiddenType::class, [
'attr' => [
'class' => 'range-slider-value',
],
]);
}

public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults([
'min' => 0,
'max' => 100,
'step' => 1,
'compound' => true, // Set compound to true for a composite field
]);
}

public function getParent()
{
return HiddenType::class;
}
}
