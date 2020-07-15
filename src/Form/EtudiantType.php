<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule')
            ->add('prenom')
            ->add('nom')
            ->add('email')
            ->add('telephone')
            ->add('dateNaissance', BirthdayType::class, [
                'format' => 'yyyy-MM-dd' 
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'choisir un type' => 'choisir un type',
                    'boursierloger' => 'boursierloger',
                    'boursiernonloger' => 'boursiernonloger',
                    'nonboursier' => 'nonboursier'
                ]
            ])
            ->add('montant')
            ->add('adresse')
            ->add('numChambre');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}