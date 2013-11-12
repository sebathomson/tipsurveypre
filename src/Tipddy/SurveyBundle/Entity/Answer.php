<?php

namespace Tipddy\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Answer
 *
 * @ORM\Table(name="tipsurvey_answer")
 * @ORM\Entity
 */
class Answer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
   /**
    * @ORM\Column(name="answer", type="text", nullable=true)
    *
    */
    private $answer;

   /**
    * @ORM\Column(name="photo", type="string", length=255, nullable=true)
    *
    * @Assert\Image() 
    */
    protected $photo;
       
    /**
     * @ORM\Column(name="video", type="text", nullable=true)
     *
     * @Assert\Url()
     */
    protected $video;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="question_id",    referencedColumnName="id")
     * })
     */
    protected $question;	 


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
     * Set answer
     *
     * @param string $answer
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    
        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Answer
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Answer
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set question
     *
     * @param \Tipddy\SurveyBundle\Entity\Question $question
     * @return Answer
     */
    public function setQuestion(\Tipddy\SurveyBundle\Entity\Question $question = null)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return \Tipddy\SurveyBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}