<?php

namespace FunQ\Bundle\FunQBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
   /* public function indexAction($name)
    {
        return $this->render('FunQBundle:Default:index.html.twig', array('name' => $name));
    }*/
    
    public function indexAction ( $name , $count)
    {
        $arr = array(
            'First Name'=>$name,
            'Count' => $count,
            'status'=>'It\'s a trap!',
            );
        $response = new Response(json_encode($arr));
        $response->headers->set('Content-Type','application/json');
        return $response;
    }
    
}

