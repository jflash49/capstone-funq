<?php 
// src/FunQ/UserBundle/Controller/RegisterController.php
namespace FunQ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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
            
            $defaultuser->setPassword(
                $this->encodePassword($defaultuser, $defaultuser->getPlainPassword())
                );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
           
            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Welcome to the Death Star, have a magical day!')
            ;
            
            $this->authenticateUser($user);
            $key = '_security.'.$providerKey.'.target_path';
            $session = $this->getRequest()->getSession();

             // get the URL to the last page, or fallback to the homepage
             if ($session->has($key)) {
                 $url = $session->get($key);
                 $session->remove($key);
             } else {
                 $url = $this->generateUrl('user');
            }//$url = $this->generateUrl('user');
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
    
    private function authenticateUser(UserBundle $user)
    {
        $providerKey = 'secured_area'; // your firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());
    
        $this->container->get('security.context')->setToken($token);
    }
}