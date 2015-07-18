<?php 
// src/FunQ/UserBundle/Controller/RegisterController.php
namespace FunQ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use FunQ\UserBundle\Entity\UserBundle;
use FunQ\UserBundle\Form\RegisterFormType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @Template
     */ 
    public function registerAction(Request $request)
    {
        $defaultuser = new UserBundle();
        $defaultuser->setUsername('Leia');
        
        $form = $this->createForm(new RegisterFormType(),$defaultuser);
           /* ->add('username', 'text')
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array( 'type' =>'password',))
            ->getForm() 
        ;*/
        $form->handleRequest($request);
        if ($form->isValid()){
            $data = $form->getData();
            
            $user->setPassword(
                $this->encodePassword($user, $user->getPlainPassword())
                );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $url = $this->generateUrl('user');
            return $this->redirect($url);
        }
        return array('form' => $form->createView());
        // todo
    }
    
    private function encodePassword(UserBundle $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;
    
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}