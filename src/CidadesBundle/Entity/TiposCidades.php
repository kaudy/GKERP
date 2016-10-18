<?php

namespace CidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TiposCidades
 *
 * @ORM\Table(name="tipos_cidades")
 * @ORM\Entity(repositoryClass="CidadesBundle\Repository\TiposCidadesRepository")
 */
class TiposCidades
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
     * @ORM\Column(name="tipo", type="string", length=50)
     */
    private $tipo;


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
     * @return TiposCidades
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
     * 
     * @return string
     */
    public function __toString() 
    {
        return $this->tipo;
    }
}

