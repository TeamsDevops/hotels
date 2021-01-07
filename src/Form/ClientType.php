<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateariv',EntityType::class, [
                'class' => Reservation::class,
                'choice_label' => 'dateAriv',
            ])
            ->add('datedep',EntityType::class, [
                'class' => Reservation::class,
                'choice_label' => 'dateDep',
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
