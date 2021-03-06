<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom' ,TextType::class,[
                'label'=>'Nom ',
                'attr'=>[
                    'placeholder'=>'le nom',
                    'class'=>'nom'
                ]
            ])
            ->add('Prenom',TextType::class,[
                'label'=>'Prenom ',
                'attr'=>[
                    'placeholder'=>'le prenom',
                    'class'=>'prenom'
                ]
            ])
            ->add('Localisation',TextType::class,[
                'label'=>'Localisation',
                'attr'=>[
                    'placeholder'=>'le localisation',
                    'class'=>'Localisation'
                ]
            ])
            ->add('Email',TextType::class,[
                'label'=>'Email',
                'attr'=>[
                    'placeholder'=>'le email',
                    'class'=>'email'
                ]
            ])
            ->add('Age',TextType::class,[
                'label'=>'Age',
                'attr'=>[
                    'placeholder'=>'age',
                    'class'=>'age'
                ]
            ])
            ->add('NumTel',TextType::class,[
                'label'=>'NumTel ',
                'attr'=>[
                    'placeholder'=>'NumTel',
                    'class'=>'NumTel'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
