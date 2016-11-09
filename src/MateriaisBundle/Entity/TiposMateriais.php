<?php

namespace MateriaisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposMateriais
 *
 * @ORM\Table(name="tipos_materiais")
 * @ORM\Entity(repositoryClass="MateriaisBundle\Repository\TiposMateriaisRepository")
 */
class TiposMateriais
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
     * @ORM\Column(name="tipo", type="string", length=100)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuarios")
     * @ORM\JoinColumn(name="id_usuario_cadastro", referencedColumnName="id")
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
     * @ORM\Column(name="ativo", type="string", length=1)
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TiposMateriais
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return TiposMateriais
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set usuarioCadastro
     *
     * @param \AppBundle\Entity\Usuarios $usuarioCadastro
     *
     * @return TiposMateriais
     */
    public function setUsuarioCadastro(\AppBundle\Entity\Usuarios $usuarioCadastro = null)
    {
        $this->usuarioCadastro = $usuarioCadastro;

        return $this;
    }

    /**
     * Get usuarioCadastro
     *
     * @return \AppBundle\Entity\Usuarios
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
     * @return TiposMateriais
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
     * @return TiposMateriais
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
    
    /**
     * Retorna String padrão da Entidade
     * 
     * @return string tipo
     */
    public function __toString()
    {
        return $this->tipo;
    }
}

