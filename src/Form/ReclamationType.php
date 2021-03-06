<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
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
            ->add('Email',TextType::class,[
                'label'=>'Email',
                'attr'=>[
                    'placeholder'=>'le email',
                    'class'=>'email'
                ]
            ])
            ->add('Comentaire',TextType::class,[
                'label'=>'Commentaire',
                'attr'=>[
                    'placeholder'=>'commentaire',
                    'class'=>'commentaire'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
