<?php

namespace MateriaisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DetalhesMateriaisType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('material')
                ->add('marca')
                ->add('categoriaMaterial')
                ->add('tipoMaterial')                
                ->add('codigoBarra')
                ->add('tipoUnidade')
                ->add('unidade')
                ->add('pesoUnitario')
                ->add('volumeUnitario')
                ->add('validadeBase')
                ->add('modelo')
                ->add('referenciaModelo')
                ->add('descricao')
                ->add('ativo',ChoiceType::class, array(
                    'choices' => array(
                        'Sim' => 'S',
                        'Não' => 'N'                        
                    )                    
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MateriaisBundle\Entity\DetalhesMateriais'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'materiaisbundle_detalhesmateriais';
    }


}
