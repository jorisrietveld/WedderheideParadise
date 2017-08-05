<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReserveControllerTest extends WebTestCase
{
    public function testReserveren()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserveren');
    }

    public function testReserverencamping()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/reserveren/camping');
    }

}
