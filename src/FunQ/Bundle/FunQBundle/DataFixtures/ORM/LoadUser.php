<?php 
// src/FunQ/UserBundle/DataFixtures/ORM/LoadUsers.php
namespace FunQ\Bundle\FunQBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FunQ\UserBundle\Entity\UserBundle;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUsers implements FixtureInterface, OrderedFixtureInterface
{
    private $container;
        
    public function load(ObjectManager $manager)
    {
        $wayne = $manager->getRepository('UserBundle:User')
            ->findOneByUsernameOrEmail('wayne');
        // ...
    
        $event1->setOwner($wayne);
        $event2->setOwner($wayne);
        
         $wayne->setPassword($this-> encodePassword($user,'darthpass'));
        // ...
        $manager->flush();
    }
    /*
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('darth');
        // todo - fill in this encoded password... ya know... somehow...
        $user->setPassword($this-> encodePassword($user,'darthpass'));
        $user->setEmail('darth@deathstar.com');
        $admin->setEmail('wayne@deathstar.com');
       // $admin->setIsActive(false);
        $manager->persist($user);
        
        // the queries aren't done until now
        $manager->flush();
        
    }
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    private function encodePassword(User $user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;
    
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }*/
    
     public function getOrder()
    {
        return 20;
    }
}