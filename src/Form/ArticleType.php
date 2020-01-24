<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   //  formulaire pour la creation des articles
        $builder
            ->add('titre', TextType::class, ['label' => 'titre', 'attr' => ['class' => 'form-control'],])
            ->add('date', DateTimeType::class, ['label' => 'date', 'placeholder' => [
                'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
            ],])
            ->add('descriptif', TextareaType::class, ['label' => 'Descriptif', 'attr' => ['class' => 'form-control'],])
            ->add('submit', SubmitType::class)
            ->getform();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,

        ]);
    }
}
