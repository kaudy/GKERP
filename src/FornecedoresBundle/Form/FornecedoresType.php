<?php

namespace FornecedoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FornecedoresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cnpj', TextType::class, array('label' => 'CNPJ'))
                ->add('razaoSocial', TextType::class, array('label' => 'Razão Social'))
                ->add('nomeFantasia', TextType::class, array('label' => 'Nome Fantasia'))
                ->add('inscricaoEstatual', TextType::class, array('label' => 'Inscrição Estadual'))
                ->add('endereco' , TextType::class, array('label' => 'Endereço'))
                ->add('numero', TextType::class, array('label' => 'Numero'))
                ->add('complemento', TextType::class, array('label' => 'Complemento'))
                ->add('cep', TextType::class, array('label' => 'Cep'))
                ->add('bairro', TextType::class, array('label' => 'Bairro'))            
        
                //Estado
                ->add('estado', EntityType::class, array(
                    'class' => 'CidadesBundle:Estados',                    
                    'choice_label' => 'Estado',
                    'placeholder' => 'Escolha um estado',
                ))  
                //Cidade
                ->add('cidade', EntityType::class, array(
                    'class' => 'CidadesBundle:Cidades',                    
                    'choice_label' => 'Cidade',
                    'placeholder' => 'Escolha uma cidade',
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FornecedoresBundle\Entity\Fornecedores'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fornecedoresbundle_fornecedores';
    }


}
