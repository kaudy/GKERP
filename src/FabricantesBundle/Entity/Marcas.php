<?php

namespace FabricantesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marcas
 *
 * @ORM\Table(name="marcas")
 * @ORM\Entity(repositoryClass="FabricantesBundle\Repository\MarcasRepository")
 */
class Marcas
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
     * @ORM\ManyToOne(targetEntity="Fabricantes")
     * @ORM\JoinColumn(name="id_fabricante", referencedColumnName="id")
     */
    private $fabricante;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=100, unique=true)
     */
    private $marca;
    
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
     * Set fabricante
     *
     * @param \FabricantesBundle\Entity\Fabricantes $fabricante
     *
     * @return Marcas
     */
    public function setFabricante(\FabricantesBundle\Entity\Fabricantes $fabricante = null)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get fabricante
     *
     * @return \FabricantesBundle\Entity\Fabricantes
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Marcas
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set usuarioCadastro
     *
     * @param @param \AppBundle\Entity\Usuarios $usuarioCadastro
     *
     * @return Marcas
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
     * @return Marcas
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
     * @return Marcas
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
        return $this->marca;
    }
    
    
    
}

