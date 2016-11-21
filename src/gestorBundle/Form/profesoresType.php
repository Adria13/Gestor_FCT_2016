<?php

namespace gestorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class profesoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombre',TextType::class,array('label'=>'Nombre de la empresa',
                                              'label_attr'=>array('class'=>'tag'),
                                              'attr'=> array('class' => 'tag2')))
        ->add('apellidos',TextType::class,array('label'=>'Apellidos',
                                              'label_attr'=>array('class'=>'tag'),
                                              'attr'=> array('class' => 'tag2')))
        ->add('departamento',IntegerType::class,array('label'=>'Departamento',
                                              'label_attr'=>array('class'=>'tag'),
                                              'attr'=> array('class' => 'tag2')))

  ->add('guardar',SubmitType::class)
  ->add('borrar',ResetType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gestorBundle\Entity\profesores'
        ));
    }
}
