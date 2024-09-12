<?php

namespace App\Form;

use App\Entity\ObjectCategory;
use App\Entity\ObjectTool;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectToolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('object_condition')
            ->add('prix_jour')
            ->add('image')
            ->add('UserID', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('objectCategory', EntityType::class, [
                'class' => ObjectCategory::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ObjectTool::class,
        ]);
    }
}
