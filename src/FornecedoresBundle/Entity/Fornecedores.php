<?php

namespace FornecedoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use CidadesBundle\Entity\Estados as Estados;
use CidadesBundle\Entity\Cidades as Cidades;

/**
 * Fornecedores
 *
 * @ORM\Table(name="fornecedores")
 * @ORM\Entity(repositoryClass="FornecedoresBundle\Repository\FornecedoresRepository")
 */
class Fornecedores
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=14, unique=true)
     */
    private $cnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="razao_social", type="string", length=255)
     */
    private $razaoSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_fantasia", type="string", length=255)
     */
    private $nomeFantasia;

    /**
     * @var string
     *
     * @ORM\Column(name="inscricao_estatual", type="string", length=30)
     */
    private $inscricaoEstatual;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=255)
     */
    private $endereco;

    /**
     * @var int
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="complemento", type="string", length=150, nullable=true)
     */
    private $complemento;

    /**
     * @var int
     *
     * @ORM\Column(name="cep", type="integer", nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255, nullable=true)
     */
    private $bairro;

    /**
     * @ORM\ManyToOne(targetEntity="CidadesBundle\Entity\Estados")
     * @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="CidadesBundle\Entity\Cidades")
     * @ORM\JoinColumn(name="id_cidade", referencedColumnName="id")
     */
    private $cidade;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario_cadastro", type="integer", nullable=true)
     */
    private $usuarioCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="ativo", type="string", length=1, nullable=true)
     */
    private $ativo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     *
     * @return Fornecedores
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set razaoSocial
     *
     * @param string $razaoSocial
     *
     * @return Fornecedores
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    /**
     * Get razaoSocial
     *
     * @return string
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * Set nomeFantasia
     *
     * @param string $nomeFantasia
     *
     * @return Fornecedores
     */
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    /**
     * Get nomeFantasia
     *
     * @return string
     */
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    /**
     * Set inscricaoEstatual
     *
     * @param string $inscricaoEstatual
     *
     * @return Fornecedores
     */
    public function setInscricaoEstatual($inscricaoEstatual)
    {
        $this->inscricaoEstatual = $inscricaoEstatual;

        return $this;
    }

    /**
     * Get inscricaoEstatual
     *
     * @return string
     */
    public function getInscricaoEstatual()
    {
        return $this->inscricaoEstatual;
    }

    /**
     * Set endereco
     *
     * @param string $endereco
     *
     * @return Fornecedores
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     *
     * @return Fornecedores
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set complemento
     *
     * @param string $complemento
     *
     * @return Fornecedores
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set cep
     *
     * @param integer $cep
     *
     * @return Fornecedores
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return int
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Fornecedores
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    
    /**
     * Set estado
     *
     * @param \CidadesBundle\Entity\Estados $estado
     *
     * @return Fornecedores
     */
    public function setEstado(\CidadesBundle\Entity\Estados $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \CidadesBundle\Entity\Estados
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cidade
     *
     * @param \CidadesBundle\Entity\Cidades $cidade
     *
     * @return Fornecedores
     */
    public function setCidade(\CidadesBundle\Entity\Cidades $cidade = null)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return \CidadesBundle\Entity\Cidades
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set usuarioCadastro
     *
     * @param integer $usuarioCadastro
     *
     * @return Fornecedores
     */
    public function setUsuarioCadastro($usuarioCadastro)
    {
        $this->usuarioCadastro = $usuarioCadastro;

        return $this;
    }

    /**
     * Get usuarioCadastro
     *
     * @return int
     */
    public function getUsuarioCadastro()
    {
        return $this->usuarioCadastro;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     *
     * @return Fornecedores
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set ativo
     *
     * @param string $ativo
     *
     * @return Fornecedores
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return string
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
    
    public function __toString()
    {
        return $this->getNomeFantasia();
    }
}

