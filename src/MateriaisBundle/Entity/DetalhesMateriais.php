<?php

namespace MateriaisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalhesMateriais
 *
 * @ORM\Table(name="detalhes_materiais")
 * @ORM\Entity(repositoryClass="MateriaisBundle\Repository\DetalhesMateriaisRepository")
 */
class DetalhesMateriais
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
     * @ORM\ManyToOne(targetEntity="MateriaisBundle\Entity\Materiais")
     * @ORM\JoinColumn(name="id_material", referencedColumnName="id")
     */
    private $material;
    
    /**
     * @ORM\ManyToOne(targetEntity="MateriaisBundle\Entity\TiposMateriais")
     * @ORM\JoinColumn(name="id_tipo_material", referencedColumnName="id")
     */
    private $tipoMaterial;
    
    /**
     * @ORM\ManyToOne(targetEntity="MateriaisBundle\Entity\CategoriasMateriais")
     * @ORM\JoinColumn(name="id_categoria_material", referencedColumnName="id")
     */
    private $categoriaMaterial;

    /**
     * @ORM\ManyToOne(targetEntity="FabricantesBundle\Entity\Marcas")
     * @ORM\JoinColumn(name="id_marca", referencedColumnName="id")
     */
    private $marca;

     /**
     * @ORM\ManyToOne(targetEntity="MateriaisBundle\Entity\TiposUnidades")
     * @ORM\JoinColumn(name="id_tipo_unidade", referencedColumnName="id")
     */
    private $tipoUnidade;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_barra", type="string", length=20)
     */
    private $codigoBarra;

    /**
     * @var int
     *
     * @ORM\Column(name="unidade", type="integer")
     */
    private $unidade;

    /**
     * @var float
     *
     * @ORM\Column(name="peso_unitario", type="float", nullable=true)
     */
    private $pesoUnitario;

    /**
     * @var float
     *
     * @ORM\Column(name="volume_unitario", type="float", nullable=true)
     */
    private $volumeUnitario;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=100, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia_modelo", type="string", length=100, nullable=true)
     */
    private $referenciaModelo;

    /**
     * @var int
     *
     * @ORM\Column(name="validade_base", type="integer", nullable=true)
     */
    private $validadeBase;

     /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuarios")
     * @ORM\JoinColumn(name="id_usuario_cadastro", referencedColumnName="id")
     */
    
    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=200, nullable=true)
     */
    private $descricao;
    
    
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
     * @param \MateriaisBundle\Entity\Materiais $material
     *
     * @return DetalhesMateriais
     */
    public function setMaterial(\MateriaisBundle\Entity\Materiais $material)
    {
        $this->material = $material;

        return $this;
    }

    /**
     * Get material
     *
     * @return \MateriaisBundle\Entity\Materiais
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set tipoMaterial
     *
     * @param \MateriaisBundle\Entity\TiposMateriais $tipoMaterial
     *
     * @return DetalhesMateriais
     */
    public function setTipoMaterial(\MateriaisBundle\Entity\TiposMateriais $tipoMaterial = null)
    {
        $this->tipoMaterial = $tipoMaterial;

        return $this;
    }

    /**
     * Get tipoMaterial
     *
     * @return \MateriaisBundle\Entity\TiposMateriais
     */
    public function getTipoMaterial()
    {
        return $this->tipoMaterial;
    }

    /**
     * Set categoriaMaterial
     *
     * @param \MateriaisBundle\Entity\CategoriasMateriais $categoriaMaterial
     *
     * @return DetalhesMateriais
     */
    public function setCategoriaMaterial(\MateriaisBundle\Entity\CategoriasMateriais $categoriaMaterial = null)
    {
        $this->categoriaMaterial = $categoriaMaterial;

        return $this;
    }

    /**
     * Get categoriaMaterial
     *
     * @return \MateriaisBundle\Entity\CategoriasMateriais
     */
    public function getCategoriaMaterial()
    {
        return $this->categoriaMaterial;
    }

    /**
     * Set marca
     *
     * @param \FabricantesBundle\Entity\Marcas $marca
     *
     * @return DetalhesMateriais
     */
    public function setMarca(\FabricantesBundle\Entity\Marcas $marca = null)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return FabricantesBundle\Entity\Marcas
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set tipoUnidade
     *
     * @param MateriaisBundle\Entity\TiposUnidades $tipoUnidade
     *
     * @return DetalhesMateriais
     */
    public function setTipoUnidade(\MateriaisBundle\Entity\TiposUnidades $tipoUnidade = null)
    {
        $this->tipoUnidade = $tipoUnidade;

        return $this;
    }

    /**
     * Get tipoUnidade
     *
     * @return MateriaisBundle\Entity\TiposUnidades
     */
    public function getTipoUnidade()
    {
        return $this->tipoUnidade;
    }

    /**
     * Set codigoBarra
     *
     * @param string $codigoBarra
     *
     * @return DetalhesMateriais
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;

        return $this;
    }

    /**
     * Get codigoBarra
     *
     * @return string
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set unidade
     *
     * @param integer $unidade
     *
     * @return DetalhesMateriais
     */
    public function setUnidade($unidade)
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * Get unidade
     *
     * @return int
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * Set pesoUnitario
     *
     * @param float $pesoUnitario
     *
     * @return DetalhesMateriais
     */
    public function setPesoUnitario($pesoUnitario)
    {
        $this->pesoUnitario = $pesoUnitario;

        return $this;
    }

    /**
     * Get pesoUnitario
     *
     * @return float
     */
    public function getPesoUnitario()
    {
        return $this->pesoUnitario;
    }

    /**
     * Set volumeUnitario
     *
     * @param float $volumeUnitario
     *
     * @return DetalhesMateriais
     */
    public function setVolumeUnitario($volumeUnitario)
    {
        $this->volumeUnitario = $volumeUnitario;

        return $this;
    }

    /**
     * Get volumeUnitario
     *
     * @return float
     */
    public function getVolumeUnitario()
    {
        return $this->volumeUnitario;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return DetalhesMateriais
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set referenciaModelo
     *
     * @param string $referenciaModelo
     *
     * @return DetalhesMateriais
     */
    public function setReferenciaModelo($referenciaModelo)
    {
        $this->referenciaModelo = $referenciaModelo;

        return $this;
    }

    /**
     * Get referenciaModelo
     *
     * @return string
     */
    public function getReferenciaModelo()
    {
        return $this->referenciaModelo;
    }

    /**
     * Set validadeBase
     *
     * @param integer $validadeBase
     *
     * @return DetalhesMateriais
     */
    public function setValidadeBase($validadeBase)
    {
        $this->validadeBase = $validadeBase;

        return $this;
    }

    /**
     * Get validadeBase
     *
     * @return int
     */
    public function getValidadeBase()
    {
        return $this->validadeBase;
    }

    /**
     * Set usuarioCadastro
     *
     * @param \AppBundle\Entity\Usuarios $usuarioCadastro
     *
     * @return DetalhesMateriais
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
     * @return DetalhesMateriais
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
     * @return DetalhesMateriais
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
     * Set descricao
     *
     * @param string $descricao
     *
     * @return DetalhesMateriais
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

        
    
    /***********************************************************************************************
     * Retorna o total de peso das unidades
     * Unidades * Peso Unitario
     * 
     * Get pesoTotal
     * 
     * @return int
     */
    public function getPesoTotal()
    {
        if(isset($this->pesoUnitario))
        {
            $totalPeso = $this->unidade * $this->pesoUnitario;
        }else
        {
            $totalPeso = null;
        }
                        
        return $totalPeso;
    }
    
    /***********************************************************************************************
     * Retorna o total do volume das unidades
     * Unidades * Volume Unitario
     * 
     * Get volumeTotal
     * 
     * @return int
     */
    public function getVolumeTotal()
    {
        if(isset($this->volumeUnitario))
        {
            $totalVolume = $this->unidade * $this->volumeUnitario;    
        }else
        {
            $totalVolume = null;
        }
                        
        return $totalVolume;
    }
    
    
    
}

