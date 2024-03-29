<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password', PasswordType::class,[
                "label" => "Password :",
                "attr" => ["class"=> "form-control"],
                "row_attr" => ["class"=> "form-group mt-3"]
            ])
            ->add('passwordVerify', PasswordType::class,[
                "label" => "Verification Password :",
                "attr" => ["class"=> "form-control"],
                "row_attr" => ["class"=> "form-group mt-3"]
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
