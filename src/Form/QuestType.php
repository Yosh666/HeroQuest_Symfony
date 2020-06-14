<?php

namespace App\Form;

use App\Entity\Aventurier;
use App\Entity\Quest;
use App\Entity\Voie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Nom de la quête'
            ])
            ->add('nb_heroes',IntegerType::class,[
                'label'=>'Taille de la compagnie'
            ])
            ->add('started_at',DateType::class,[
                'label'=>'le dongeon s\'ouvre le:',
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text'
            ])
            ->add('difficulty',IntegerType::class,[
                'label'=>'Difficulté'
            ])
            ->add('align',IntegerType::class,[
                'label'=> 'alignement'
            ])
            ->add('voies',EntityType::class,[
                'class'=> Voie::class,
                'label'=> 'quel genre d\'aventuriers:',
                'choice_label'=> 'name',
                'required'=>false,
                'multiple'=>true,
                'expanded'=>true
            ])
            ->add('aventuriers',EntityType::class,[
                'class'=>Aventurier::class,
                'label'=> 'name',
                'required'=>false,
                'multiple'=>true,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Quest::class,
        ]);
    }
}
