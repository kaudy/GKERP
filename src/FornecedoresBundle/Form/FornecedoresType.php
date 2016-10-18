<?php

namespace FornecedoresBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FornecedoresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cnpj')->add('razaoSocial')->add('nomeFantasia')->add('inscricaoEstatual')->add('endereco')->add('numero')->add('complemento')->add('cep')->add('bairro')->add('estado')->add('cidade');
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
