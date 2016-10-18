<?php

namespace CidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cidades
 *
 * @ORM\Table(name="cidades")
 * @ORM\Entity(repositoryClass="CidadesBundle\Repository\CidadesRepository")
 */
class Cidades
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
     * @ORM\ManyToOne(targetEntity="Estados")
     * @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     */
    private $idEstado;

    
    /**
     * @ORM\ManyToOne(targetEntity="TiposCidades")
     * @ORM\JoinColumn(name="id_tipo_cidade", referencedColumnName="id")
     */
    private $idTipoCidade;

    
    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=100)
     */
    private $cidade;


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
     * Set idEstado
     *
     * @param  \CidadesBundle\Entity\Estados $estado
     *
     * @return Cidades
     */
    public function setIdEstado(\CidadesBundle\Entity\Estados $estado = null)
    {
        $this->idEstado = $estado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \CidadesBundle\Entity\Estados
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idTipoCidade
     *
     * @param  \CidadesBundle\Entity\TiposCidades $tipoCidade
     *
     * @return Cidades
     */
    public function setIdTipoCidade(\CidadesBundle\Entity\TiposCidades $tipoCidade)
    {
        $this->idTipoCidade = $tipoCidade;

        return $this;
    }

    /**
     * Get idTipoCidade
     *
     * @return \CidadesBundle\Entity\TiposCidades
     */
    public function getIdTipoCidade()
    {
        return $this->idTipoCidade;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Cidades
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString() 
    {
        return $this->cidade;
    }
}

