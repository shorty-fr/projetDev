<?php

namespace JavaLeEET\Bundle\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UtilisateurBundle:Default:index.html.twig', array('name' => $name));
    }
}