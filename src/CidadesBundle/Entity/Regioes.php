<?php

namespace CidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regioes
 *
 * @ORM\Table(name="regioes")
 * @ORM\Entity(repositoryClass="CidadesBundle\Repository\RegioesRepository")
 */
class Regioes
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
     * @ORM\Column(name="regiao", type="string", length=50)
     */
    private $regiao;


    /**
     * Get id da Região
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set regiao
     *
     * @param string $regiao
     *
     * @return Regioes
     */
    public function setRegiao($regiao)
    {
        $this->regiao = $regiao;

        return $this;
    }

    /**
     * Get regiao
     *
     * @return string
     */
    public function getRegiao()
    {
        return $this->regiao;
    }
    
    /**
     * 
     * @return string
     */
    public function __toString() 
    {
        return $this->regiao;
    }
    
    
    
    
    
    
}

