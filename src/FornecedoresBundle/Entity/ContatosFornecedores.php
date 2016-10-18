<?php

namespace FornecedoresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContatosFornecedores
 *
 * @ORM\Table(name="contatos_fornecedores")
 * @ORM\Entity(repositoryClass="FornecedoresBundle\Repository\ContatosFornecedoresRepository")
 */
class ContatosFornecedores
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
     * @ORM\ManyToOne(targetEntity="Fornecedores")
     * @ORM\JoinColumn(name="id_fornecedor", referencedColumnName="id")
     */
    private $fornecedor;

    /**
     * @var string
     *
     * @ORM\Column(name="contato", type="string", length=255)
     */
    private $contato;

    /**
     * @var int
     *
     * @ORM\Column(name="ddd", type="integer", nullable=true)
     */
    private $ddd;

    /**
     * @var int
     *
     * @ORM\Column(name="telefone", type="integer", nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario_cadastro", type="integer")
     */
    private $usuarioCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime")
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="ativo", type="string")
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
     * Set fornecedor
     *
     * @param \FornecedoresBundle\Entity\Fornecedores  $fornecedor
     *
     * @return ContatosFornecedores
     */
    public function setFornecedor(\FornecedoresBundle\Entity\Fornecedores $fornecedor = null)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    /**
     * Get fornecedor
     *
     * @return \FornecedoresBundle\Entity\Fornecedores
     */
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Set contato
     *
     * @param string $contato
     *
     * @return ContatosFornecedores
     */
    public function setContato($contato)
    {
        $this->contato = $contato;

        return $this;
    }

    /**
     * Get contato
     *
     * @return string
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * Set ddd
     *
     * @param integer $ddd
     *
     * @return ContatosFornecedores
     */
    public function setDdd($ddd)
    {
        $this->ddd = $ddd;

        return $this;
    }

    /**
     * Get ddd
     *
     * @return int
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * Set telefone
     *
     * @param integer $telefone
     *
     * @return ContatosFornecedores
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return int
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return ContatosFornecedores
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set usuarioCadastro
     *
     * @param integer $usuarioCadastro
     *
     * @return ContatosFornecedores
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
     * @return ContatosFornecedores
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
     * @return ContatosFornecedores
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
}

