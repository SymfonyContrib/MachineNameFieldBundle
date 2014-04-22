<?php

namespace SymfonyContrib\Bundle\MachineNameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MachineNameBundle:Default:index.html.twig', array('name' => $name));
    }
}
