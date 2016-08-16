<?php

namespace Acard\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CityControllerTest extends WebTestCase
{
    public function testFindbyprovince()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/city/findByProvince');
    }

}
