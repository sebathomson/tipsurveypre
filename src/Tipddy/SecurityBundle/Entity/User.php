<?php
namespace Tipddy\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tipddy\SecurityBundle\Entity\User
 *
 * @ORM\Table(name="tipsurvey_user")
 * @ORM\Entity
 */
 class User implements UserInterface
 {
	 /**
	  * @var bigint $id
	  *
	  * @ORM\Column(name="id", type="bigint", nullable=false)
	  * @ORM\Id
	  * @ORM\GeneratedValue(strategy="IDENTITY")
	  */
	 private $id;
	 
	 /**
	  * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
	  *
	  */
	 private $firstName;
	 
	 /**
	  * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
	  *
	  */
	 private $lastName;
	
	 /**
	  * @ORM\Column(name="email", type="string", length=255, unique=true)
	  *
	  */
	 private $email;

	 /**
	  * @ORM\Column(name="password", type="string", length=255, nullable=false)
	  *
	  */
	 private $password;

	 /**
	  * @ORM\Column(name="salt", type="string", length=255, nullable=true)
	  *
	  */
	 private $salt;

	 /**
	  * @ORM\Column(name="address", type="string", length=255, nullable=true)
	  *
	  */
	 private $address;
	 
	
    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="tipsurvey_user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
	 *      )
	 */    
	 private $userRoles;
	 
	 
	 
	 /**
      * Método requerido por la interfaz UserInterface, se invoca cuando la aplicación desea borrar información sensible del usuario, por ejemplo contraseña, en la mayoría de las aplicaciones puede estar vacío
      */
    public function eraseCredentials()
    {

    }


    /**
     * Método requerido por la interfaz UserInterface, se invoca este método para obtener un array con todos los roles que posee.
     */
    public function getRoles()
    {
        return array('ROLE_USUARIO');
    }


    /**
     * Método requerido por la interfaz getUsername, se invoca para obtener el login o nombre de usuario que se utiliza para autenticar los usuarios.
     */
    public function getUsername()
    {
        return $this->getEmail();
    }
	 
	 
	 
     /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRoles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add userRoles
     *
     * @param \Tipddy\SecurityBundle\Entity\Role $userRoles
     * @return User
     */
    public function addUserRole(\Tipddy\SecurityBundle\Entity\Role $userRoles)
    {
        $this->userRoles[] = $userRoles;
    
        return $this;
    }

    /**
     * Remove userRoles
     *
     * @param \Tipddy\SecurityBundle\Entity\Role $userRoles
     */
    public function removeUserRole(\Tipddy\SecurityBundle\Entity\Role $userRoles)
    {
        $this->userRoles->removeElement($userRoles);
    }

    /**
     * Get userRoles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
}