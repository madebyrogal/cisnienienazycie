<?php

namespace Acard\FrontendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CompetitionControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'formularz-konkursowy.html');
    }

    public function testSendform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'formularz-konkursowy-podziekowanie.html');
    }

}
