<?php

namespace Acard\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EventControllerTest extends WebTestCase
{
    public function testFindbycity()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/event/findByCity');
    }

}
