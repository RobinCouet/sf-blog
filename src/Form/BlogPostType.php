<?php

namespace App\Form;

use App\Entity\BlogPost;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// https://symfony.com/doc/current/reference/forms/types.html
use Symfony\Component\Form\Extension\Core\Type\FileType;

class BlogPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('summary')
            ->add('content')
            ->add('image', FileType::class, [
                'label' => "Image (JPG - PNG)",
                'mapped' => false, // Permet de ne pas sauvegarder le fichier en DB automatiquement, ca sera fait a la main
            ])
            ->add('publishedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BlogPost::class,
        ]);
    }
}
