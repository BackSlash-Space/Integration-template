<?php

namespace App\Form;

use App\Entity\Evenement;
use Doctrine\DBAL\Types\DateType;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTimeType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEvent',TextType::class)
            ->add('dateEvent',TextType::class)
            ->add('lieuEvent',TextType::class)
            ->add('descEvent',TextareaType::class)
            ->add('imageEvent',FileType::class, array('data_class' => null, 'required' => false,))
            ->add('cancelEvent',CheckboxType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
            'csrf_protection' => false
        ]);
    }
    public static function processImage(UploadedFile $uploaded_file)
    {
        $path='../web/images/upload/images/Evenement';
        $file_name=$uploaded_file->getClientOriginalName();
        $uploaded_file->move($path ,$file_name);
        return $file_name;
    }
}

