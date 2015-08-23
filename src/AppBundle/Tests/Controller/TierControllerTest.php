<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TierControllerTest extends WebTestCase
{
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newTier');
    }

    public function testRemove()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/removeTier');
    }

}
