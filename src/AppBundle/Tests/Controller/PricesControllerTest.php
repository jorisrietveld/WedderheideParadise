<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PricesControllerTest extends WebTestCase
{
    public function testPrijzen()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/prijzen');
    }

}
