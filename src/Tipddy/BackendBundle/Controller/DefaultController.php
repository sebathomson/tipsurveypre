<?php

namespace Tipddy\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TipddyBackendBundle:Default:index.html.twig', array('name' => $name));
    }
}
