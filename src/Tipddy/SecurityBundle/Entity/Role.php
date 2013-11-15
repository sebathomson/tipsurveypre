<?php
namespace Tipddy\SecurityBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tipsurvey_role")
 * @ORM\Entity
 */
class Role implements RoleInterface
{
   /**
    * @var bigint $id
    *
    * @ORM\Column(name="id", type="smallint", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
   protected $id;
   
   /**
    * @ORM\Column(name="etiqueta", type="string", length=255, nullable=false)
    *
    */
   protected $etiqueta;
   
   
   public function getRole()
   {
	   return $this->getEtiqueta();
   }
   
   public function __toString()
   {
	   return $this->getRole();
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
     * @return Role
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