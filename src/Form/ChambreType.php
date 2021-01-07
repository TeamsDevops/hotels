<?php

namespace App\Form;

use App\Entity\Chambre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ChambreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('prix')
        ->add('nbrLit')
        ->add('nbrPers')
        ->add('confort')
        ->add('numRes',EntityType::class, [
            'class' => Reservation::class,
            'choice_label' => 'idRes',
        ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Chambre::class,
        ]);
    }
}
