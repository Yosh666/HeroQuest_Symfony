<?php

namespace App\Form;

use App\Entity\Aventurier;
use App\Entity\Quest;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AventurierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>'nom'
            ])
            ->add('race',TextType::class)
            ->add('align',IntegerType::class,[
                'label'=>'alignement',
                'placeholder'=>'-10 to +10'
            ])
            ->add('quests',EntityType::class,[
                'class'=> Quest::class,
                'label'=> 'Quête',
                'choice_label'=>'title',
                'required'=>false,
                'multiple'=>false,
                'expanded'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aventurier::class,
        ]);
    }
}
