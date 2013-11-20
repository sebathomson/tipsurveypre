<?php

namespace Tipddy\SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Tipddy\SurveyBundle\Form\AnswerType;

class QuestionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', 'text')
            ->add('description', 'text')
            ->add('randomOrder')
            ->add('questionRequired')
           // ->add('survey')
            ->add('questionType', null, array('empty_value' => false))
            ->add('answerType', null, array('empty_value' => false))
            ->add('answers', 'collection', array(
                 'type' => new AnswerType(),
                 'allow_add' => true,
                 'allow_delete' => true,
                 'required' => true,
                 'by_reference' => false
            ));
    }
    
    /**	
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tipddy\SurveyBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tipddy_surveybundle_question';
    }
}
