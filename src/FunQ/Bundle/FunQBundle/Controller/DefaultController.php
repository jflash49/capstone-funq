<?php

namespace FunQ\Bundle\FunQBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction ( $name , $count)
    {
        //setting up controller
        //return $this->render('FunQBundle:Default:index.html.twig',array('name'=> $name, 'count'=>$count));
        $em = $this->getDoctrine()->getManager(); 
        $repo = $em->getRepository('FunQBundle:User');
        $user = $repo->findOneBy(array('firstName'=>'John'));
        
        return $this->render(
            'FunQBundle:Default:index.html.twig',
            array('name'=> $name,
            'count'=>$count,
            'user'=>$user)
            );
    }
    
}

