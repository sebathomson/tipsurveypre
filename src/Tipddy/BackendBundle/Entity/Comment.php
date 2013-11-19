<?php

namespace Tipddy\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="tipsurvey_comment")
 * @ORM\Entity(repositoryClass="Tipddy\BackendBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="description", type="text")
     *
     * @Assert\NotBlank()
     */
    private $description;


    /**
     * 
     * @ORM\ManyToOne(targetEntity="TypeComment")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="type_comment_id", referencedColumnName="id")
     * })
     */
    private $typeComment;
    
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Tipddy\SecurityBundle\Entity\User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set description
     *
     * @param string $description
     * @return Comment
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeComment
     *
     * @param \Tipddy\BackendBundle\Entity\TypeComment $typeComment
     * @return Comment
     */
    public function setTypeComment(\Tipddy\BackendBundle\Entity\TypeComment $typeComment = null)
    {
        $this->typeComment = $typeComment;
    
        return $this;
    }

    /**
     * Get typeComment
     *
     * @return \Tipddy\BackendBundle\Entity\TypeComment 
     */
    public function getTypeComment()
    {
        return $this->typeComment;
    }

   
   
   
   
   
   
    /**
     * Get user
     *
     * @return \Tipddy\BackendBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param \Tipddy\SecurityBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\Tipddy\SecurityBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }
}