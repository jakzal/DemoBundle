<?php

namespace Zalas\Bundle\DemoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Kuba');

        $this->assertTrue($crawler->filter('html:contains("Hello Kuba")')->count() > 0);
    }
}
