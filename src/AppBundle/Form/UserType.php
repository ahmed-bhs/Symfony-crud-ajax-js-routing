<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface$builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Name'
            ))
            ->add('age', IntegerType::class, array(
                'label' => 'Age'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data-class' => 'AppBundle\Entity\User'
        ));
    }
}