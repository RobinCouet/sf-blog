<?php

namespace App\Form;

use App\Entity\BlogPost;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
// https://symfony.com/doc/current/reference/forms/types.html
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                'required' => false
            ])
            ->add('publishedAt')
            ->add('category', EntityType::class, [
                'class' => Category::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BlogPost::class,
        ]);
    }
}
