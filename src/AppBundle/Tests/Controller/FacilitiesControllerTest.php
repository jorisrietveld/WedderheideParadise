<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FacilitiesControllerTest extends WebTestCase
{
    public function testFacilities()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/fasaliteiten');
    }

}
