<?php

namespace Tipddy\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerType
 *
 * @ORM\Table(name="tipsurvey_answertype")
 * @ORM\Entity
 */
class AnswerType
{
   /**
    * @var bigint $id
    *
    * @ORM\Column(name="id", type="smallint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    
    /**
     * @ORM\Column(name="etiqueta", type="string", length=255, nullable=false)
     *
     */
    private $etiqueta;    
     
     
   public function __toString()
   {
	   return $this->getEtiqueta();
   }




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
     * @return AnswerType
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
}