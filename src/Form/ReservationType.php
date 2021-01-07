<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Client;
use App\Entity\Chambre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('dateAriv')
            ->add('dateDep')
            ->add('numClient', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',
            ])
            ->add('numeroChembre', EntityType::class, [
                'class' => Chambre::class,
                'choice_label' => 'numero',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
