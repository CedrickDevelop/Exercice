<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComputerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('model', TextType::class, [
            'attr'  => [
                'class' => 'form-control'
            ]
        ])
        ->add('system', TextType::class, [
            'attr'  => [
                'class' => 'form-control'
            ]
        ])
        ->add('macAdresse', ChoiceType::class, [
            'attr'  => [
                'class' => 'form-control'
            ],
            'choices'   =>[
                '12.EB.3Z.E4'          => '12.EB.3Z.E4',
                '19.R4.B1.E3'          => '19.R4.B1.E3'
            ],
        ])
        ->add('images', FileType::class, [
            'data_class'    => null,
            'multiple'      => true,
            'required'      =>false,
            'attr'  => [
                'class' => 'form-control'
            ]
        ])
        ->add('purchase', DateType::class, [
            'widget'    =>  'single_text',
            'attr'  => [
                'class' => 'form-control'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' =>'AddComputer',
            'attr'  => [
                'class' => 'btn btn-success mt-3 w-100'
            ]
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Computer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_computer';
    }


}
