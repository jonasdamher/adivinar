<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 
class AdivinarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('valor', IntegerType::class, [
                'label' => 'Número',
                'trim'   => true,
                'required'   => true,
                'attr' => [
                    'placeholder' => 'Introduce el número a adivinar...',
                    'min' => 1,
                    'max' => 10000000000
                ]
            ])
            ->add('Enviar', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
