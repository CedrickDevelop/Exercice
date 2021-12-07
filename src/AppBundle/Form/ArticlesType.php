<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Articles;

class ArticlesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class, [
            'attr'  =>  [
                'class' =>  'form-control'
            ]
        ])
        ->add('qte', NumberType::class, [
            'attr'  =>  [
                'class' =>  'form-control'
            ]
        ])
        ->add('description', TextType::class, [
            'attr'  =>  [
                'class' =>  'form-control'
            ]
        ])
        ->add('email', EmailType::class, [
            'attr'  =>  [
                'class' =>  'form-control'
            ]
        ])
        ->add('submit', SubmitType::class, [
            'attr'  =>  [
                'class' =>  'btn btn-success'
            ]
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Articles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_articles';
    }


}
