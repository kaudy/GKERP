<?php

namespace CidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estados
 *
 * @ORM\Table(name="estados")
 * @ORM\Entity(repositoryClass="CidadesBundle\Repository\EstadosRepository")
 */
class Estados
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
     * @ORM\ManyToOne(targetEntity="Regioes")
     * @ORM\JoinColumn(name="id_regiao", referencedColumnName="id")
     */
    private $idRegiao;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=100)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=2)
     */
    private $uf;


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
     * Set idRegiao
     *
     * @param \CidadesBundle\Entity\Regioes $regiao
     *
     * @return Regiao
     */
    public function setIdRegiao(\CidadesBundle\Entity\Regioes $regiao = null)
    {
        $this->idRegiao = $regiao;

        return $this;
    }

    /**
     * Get idRegiao
     *
     * @return \CidadesBundle\Entity\Regioes
     */
    public function getIdRegiao()
    {
        return $this->idRegiao;
    }
    

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Estados
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Estados
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString() 
    {
        return $this->estado;
    }
}

