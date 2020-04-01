<?php

namespace App\Form;

use App\Entity\DiscussionHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message',TextareaType::class)
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn bgcolor68c2e8 formtosend text-white', 'type' => 'submit']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DiscussionHistory::class,
        ]);
    }
}

