<?php

namespace Tipddy\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeComment
 *
 * @ORM\Table(name="tipsurvey_type_comment")
 * @ORM\Entity
 */
class TypeComment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="etiqueta", type="string", length=255)
     */
    private $etiqueta;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set etiqueta
     *
     * @param string $etiqueta
     * @return TypeComment
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    
        return $this;
    }

    /**
     * Get etiqueta
     *
     * @return string 
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }
    
    
    public function __toString()
    {
	    return "hola";
    }
    
    
}