<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepartementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'attr'  => [
                'class' => 'form-control'
            ]
        ])
        ->add('domaine', ChoiceType::class, [
            'attr'  => [
                'class' => 'form-control'
            ],
            'choices'   =>[
                'choisir un domaine'    => null,
                'informatique'          => 'informatique',
                'gestion'               => 'gestion',
                'mathematique'          => 'mathematique'
            ],
            // 'expanded'  =>true       // Permet de transformer en bouton radio
        ])
        ->add('submit', SubmitType::class, [

        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Departement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_departement';
    }


}
