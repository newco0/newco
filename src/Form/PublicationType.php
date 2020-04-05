<?php

namespace App\Form;


use App\Entity\Publication;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class)
            
            ->add('poster', SubmitType::class);

        //$builder
            // ->add('images', ImageType::class, ['mapped' => 'publi', 'required' => false, 'constraints' => [
            //     new File([
            //         'mimeTypes' => [
            //             'image/jpeg',
            //             'image/png',
            //             'image/gif',
            //             'image/webp'
            //         ],
            //         'mimeTypesMessage' => 'Type invalide',
            //     ])
            // ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

            'data_class' => Publication::class,
        ]);
    }

}
