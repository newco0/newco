<?php

namespace App\Form;

use App\Form\ImageType;
use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class)
            ->add('poster', SubmitType::class);
        $builder
        ->add(
            'image', CollectionType::class,
            array(
                'entry_type' => ImageType::class,
                'by_reference' => false,
                'allow_add'    => true,
                'allow_delete' => true,
                'label' => false,
                'prototype' => true,
                
            
            )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

            'data_class' => Publication::class,
        ]);
    }

}
