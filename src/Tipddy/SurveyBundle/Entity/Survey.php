<?php

namespace Tipddy\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use Tipddy\BackendBundle\Util\Util;

/**
 * Survey
 *
 * @ORM\Table(name="tipsurvey_survey")
 * @ORM\Entity
 */
class Survey
{
       /**
        * @var bigint $id
        *
        * @ORM\Column(name="id", type="bigint", nullable=false)
        * @ORM\Id
        * @ORM\GeneratedValue(strategy="IDENTITY")
        */
       protected $id;
   
       /**
        * @ORM\Column(name="title", type="string", length=255, nullable=false)
        *
        * @Assert\NotBlank()
        */
       protected $title;
	
	
       /**
        * @ORM\Column(name="description", type="text")
        *
        * @Assert\NotBlank()
        */
      protected $description;
      
      
      /**
       * @ORM\Column(name="slug", type="string", length=255, nullable=false)
       */
      protected $slug;


      /**
       * @ORM\OneToMany(targetEntity="Question", mappedBy="survey", cascade={"all"})
       *
       */
      protected $questions;



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
     * Set title
     *
     * @param string $title
     * @return Survey
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        $this->slug = Util::getSlug($title);
        
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Survey
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
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add questions
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $questions
     * @return Survey
     */
    public function addQuestion(\Tipddy\SurveyBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;
    
        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $questions
     */
    public function removeQuestion(\Tipddy\SurveyBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Survey
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}