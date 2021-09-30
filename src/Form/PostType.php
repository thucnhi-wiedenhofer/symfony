<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add("title", TextType::class, [
                            "label" => "Titre :",
                            "attr" => ["class"=> "form-control"],
                            "row_attr" => ["class"=> "form-group mt-3"]
                        ])
            ->add("content", TextareaType::class, [
                            "label" => "Votre message :",
                            "attr" => ["class"=> "form-control"],
                            "row_attr" => ["class"=> "form-group mt-3"]
                        ])
            ->add("imageFile", FileType::class, [
                            "required" => false,                            
                            "attr" => ["class"=> "form-control"],
                            "row_attr" => ["class"=> "form-group mt-3"]
                        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
