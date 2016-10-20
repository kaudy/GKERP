<?php

namespace FornecedoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContatosFornecedoresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fornecedor')
                ->add('contato', TextType::class, array('label' => 'Contato'))
                ->add('ddd', TextType::class, array('label' => 'DDD'))
                ->add('telefone', TextType::class, array('label' => 'Telefone'))
                ->add('email', TextType::class, array('label' => 'E-Mail'))  
                ->add('ativo', TextType::class, array('label' => 'Ativo'))
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
            'data_class' => 'FornecedoresBundle\Entity\ContatosFornecedores'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fornecedoresbundle_contatosfornecedores';
    }


}
