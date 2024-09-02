<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\editor;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add ('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add ('isbn', TextType::class, [
                'label' => 'ISBN',
            ])
            ->add ('cover', TextType::class, [
                'label' => 'Couverture',
            ])
            ->add ('editedAt', null, [
                'widget' => 'single_text',
                'label' => 'Date de publication',
            ])
            ->add ('plot', TextType::class, [
                'label' => 'Résumé',
            ])
            ->add ('pageNumber', null, [
                'label' => 'Nombre de pages',
            ])
            ->add ('status', null, [
                'label' => 'Statut',
            ])
            ->add ('editor', EntityType::class, [
                'class' => Editor::class,
                'choice_label' => 'id',
            ])
            ->add ('authors', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'id',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults ([
            'data_class' => Book::class,
        ]);
    }
}
