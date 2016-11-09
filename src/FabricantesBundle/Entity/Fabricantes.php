<?php

namespace FabricantesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fabricantes
 *
 * @ORM\Table(name="fabricantes")
 * @ORM\Entity(repositoryClass="FabricantesBundle\Repository\FabricantesRepository")
 */
class Fabricantes
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
     * @ORM\Column(name="fabricante", type="string", length=200, unique=true)
     */
    private $fabricante;

    
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
     * Set fabricante
     *
     * @param string $fabricante
     *
     * @return Fabricantes
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get fabricante
     *
     * @return string
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set usuarioCadastro
     *
     * @param \AppBundle\Entity\Usuarios $usuarioCadastro
     *
     * @return Fabricantes
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
     * @return Fabricantes
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
    
    public function __toString()
    {
        return $this->getFabricante();
    }
}

