<?php

namespace MateriaisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materiais
 *
 * @ORM\Table(name="materiais")
 * @ORM\Entity(repositoryClass="MateriaisBundle\Repository\MateriaisRepository")
 */
class Materiais
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
     * @ORM\Column(name="material", type="string", length=150, unique=true)
     */
    private $material;

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
     * Set material
     *
     * @param string $material
     *
     * @return Materiais
     */
    public function setMaterial($material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set usuarioCadastro
     *
     * @param \AppBundle\Entity\Usuarios $usuarioCadastro
     *
     * @return Materiais
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
     * @return Materiais
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
     * @return Materiais
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
        return $this->material;
    }
    
    
}

