<?php

namespace MateriaisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposUnidades
 *
 * @ORM\Table(name="tipos_unidades")
 * @ORM\Entity(repositoryClass="MateriaisBundle\Repository\TiposUnidadesRepository")
 */
class TiposUnidades
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
     * @ORM\Column(name="unidade", type="string", length=50)
     */
    private $unidade;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=2)
     */
    private $sigla;

    /**
     * @var string
     *
     * @ORM\Column(name="ativo", type="string", length=1)
     */
    private $ativo;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set unidade
     *
     * @param string $unidade
     *
     * @return TiposUnidades
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return string
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     *
     * @return TiposUnidades
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
    }

    /**
     * Get sigla
     *
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set ativo
     *
     * @param string $ativo
     *
     * @return TiposUnidades
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
     * Set cadastroUsuario
     *
     * @param \AppBundle\Entity\Usuarios $cadastroUsuario
     *
     * @return TiposUnidades
     */
    public function setUsuarioCadastro(\AppBundle\Entity\Usuarios $usuarioCadastro = null)
    {
        $this->usuarioCadastro = $usuarioCadastro;

        return $this;
    }

    /**
     * Get cadastroUsuario
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
     * @return TiposUnidades
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
     * Retorna String padrão da Entidade
     * 
     * @return string categoriaMaterial(sigla)
     */
    public function __toString()
    {
        return $this->unidade.' ('.$this->sigla.')';
    }
    
}

