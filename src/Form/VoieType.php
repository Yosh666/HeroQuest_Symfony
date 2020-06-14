<?php

namespace App\Form;

use App\Entity\Voie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Master',TextType::class,[
                'label'=>"Kaioh de la voie"
            ])
            ->add('name',TextType::class,[
                'label'=> 'voie'
            ])
            //->add('quests')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voie::class,
        ]);
    }
}
