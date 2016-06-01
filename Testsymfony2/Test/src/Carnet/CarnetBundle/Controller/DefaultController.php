<?php

namespace Carnet\CarnetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CarnetBundle:Default:index.html.twig');
    }
}
