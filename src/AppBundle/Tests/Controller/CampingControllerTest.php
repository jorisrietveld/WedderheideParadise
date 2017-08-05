<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CampingControllerTest extends WebTestCase
{
    public function testCamping()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/camping');
    }

}
