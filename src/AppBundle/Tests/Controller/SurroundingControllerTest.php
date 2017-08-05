<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SurroundingControllerTest extends WebTestCase
{
    public function testSurrounding()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/omgeving');
    }

}
