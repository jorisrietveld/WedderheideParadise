<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppartementControllerTest extends WebTestCase
{
    public function testAppartement()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/appartement');
    }

}
