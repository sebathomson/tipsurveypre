<?php

namespace Tipddy\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tipddy\BackendBundle\Entity\Comment;
use Tipddy\BackendBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TipddyBackendBundle:Default:index.html.twig');
    }
    
    public function sendInformationAction()
    {
	    $entity = new Comment();
	    
	    $form = $this->createForm(new CommentType(), $entity);
	    
	    return $this->render('TipddyBackendBundle:Default:sendInformation.html.twig', array(
	       'entity' => $entity,
	       'form'   => $form->createView()
	    ));
    }
    
    
    public function createInformationAction(Request $request)
    {
	    $entity = new Comment();	    
        $form = $this->createForm(new CommentType(), $entity);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
	        $em = $this->getDoctrine()->getManager();
	        $token = $this->getUser();
	        
	        $entity->setUser($token);
	        $em->persist($entity);
	        $em->flush();
	        
	        $this->get('session')->getFlashBag()->add('result_action', 'ok');
	        
	        return $this->redirect($this->generateUrl('comment_sendinformation'));
	        
        }	    
        
        return $this->render('TipddyBackendBundle:Default:sendInformation.html.twig', array(
	       'entity' => $entity,
	       'form'   => $form->createView()
	    ));
    }
    
}
