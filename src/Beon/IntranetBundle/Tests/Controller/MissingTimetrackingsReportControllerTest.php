<?php

namespace Beon\IntranetBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MissingTimetrackingsReportControllerTest extends WebTestCase
{
    public function testReport()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/report');
    }

}
