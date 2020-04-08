<?php

namespace App\Form;

use App\Entity\Image;
use App\Form\ImageType;
use App\Entity\Publication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class)
            ->add('poster', SubmitType::class);
        $builder
        ->add(
            'image',
            CollectionType::class,
            array(
                'entry_type' => ImageType::class,
                'by_reference' => true,
                'allow_add'    => true,
                'allow_delete' => true,
                'label' => true,
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
