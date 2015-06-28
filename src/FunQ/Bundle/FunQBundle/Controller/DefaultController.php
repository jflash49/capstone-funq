<?php

namespace FunQ\Bundle\FunQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FunQFunQBundle:Default:index.html.twig');
    }
}
