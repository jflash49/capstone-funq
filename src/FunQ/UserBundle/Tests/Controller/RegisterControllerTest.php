<?php

namespace FunQ\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $client->request('GET', '/register');
        $response = $client->getResponse();
        
        $this->assertEquals(200,$response->getStatusCode());
        $this-assertContains('Register',$response->getContent());
        //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
    }
}
